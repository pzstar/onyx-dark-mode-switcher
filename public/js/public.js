class OnyxDarkModeSwitcher {
	constructor (config = {}) {
		// ======= Default Config =======
		this.config = {
			default_dark_mode: "0",
			keyboard_shortcut: "0",
			image_grayscale: "0",
			video_grayscale: "0",
			os_aware: "1",
			bg_image_darken: "1",
			bg_image_darken_to: "30",
			image_brightness_to: "100",
			image_grayscale_to: "100",
			video_brightness_to: "90",
			video_grayscale_to: "100",
			invert_inline_svg: "1",
			disallowed_elements: '',
			allowed_btn_class: [],
			...config,
		};

		// ======= Instance variables =======
		this.hasProcessRun = false;
		this.secondaryBgColor = "";
		this.darkenLevel = parseInt(this.config.bg_image_darken_to, 10) / 100;

		// ======= Observers =======
		//this.observer = new MutationObserver(() => this.initProcesses());

		this.elementsClassChanged = new MutationObserver((mutations) => {
			for (const mutation of mutations) {
				if (
					mutation.type !== "attributes" ||
					mutation.attributeName !== "class"
				) continue;

				const target = mutation.target;
				if (!target.classList.contains("onyx-handled")) continue;

				const oldClasses = target.dataset.hdClasses || "";
				const newClasses = target.className;

				if (oldClasses === newClasses) continue;

				target.dataset.hdClasses = newClasses;
				target.classList.remove("onyx-handled");
				this.processElement(target);
			}
		});

		this.darkModeStatusChanged = new MutationObserver((mutations) => {
			for (const mutation of mutations) {
				if (mutation.type !== "attributes" || mutation.attributeName !== "class") continue;
				this.updateDarkModeElements();
			}
		});
	}

	// ==========================
	//        INITIALIZER
	// ==========================

	init() {
		this.initButtonListener();
		this.initMenuButtonListener();
		this.initCustomSelectorListener();
		this.initKeyboardShortcut();
		this.initOSListener();

		if (this.isDarkModeOn()) {
			document.documentElement.classList.add("onyx-dark-mode");
			this.initObserver();
		}
	}

	// ==========================
	//        MAIN METHODS
	// ==========================

	switchTrigger() {
		if (!this.hasProcessRun) {
			this.initProcesses();
			this.initObserver();
		}

		document.documentElement.classList.toggle("onyx-dark-mode");

		this.saveDarkModeState();
	}

	saveDarkModeState() {
		localStorage.onyx_last_state = document.documentElement.classList.contains("onyx-dark-mode") ? "1" : "0";
	}

	// ==========================
	//       EVENT LISTENERS
	// ==========================

	initButtonListener() {
		document.addEventListener("DOMContentLoaded", () => {
			const trigger = document.querySelector(".onyx-toggle-button");
			if (trigger) trigger.addEventListener("click", () => this.switchTrigger());
		});
	}

	initMenuButtonListener() {
		document.addEventListener("DOMContentLoaded", () => {
			const trigger = document.querySelector(".onyx-toggle-menu");
			if (trigger) trigger.addEventListener("click", () => this.switchTrigger());
		});
	}

	initKeyboardShortcut() {
		if (this.config.keyboard_shortcut !== "1") return;

		document.addEventListener("keydown", (e) => {
			if (e.ctrlKey && e.shiftKey && e.key.toLowerCase() === "d") this.switchTrigger();
		});
	}

	initCustomSelectorListener() {
		if (onyx_obj.switch_selector) {
			document.addEventListener("DOMContentLoaded", () => {
				const trigger = document.querySelector(onyx_obj.switch_selector);
				trigger.addEventListener("click", function (e) {
					e.preventDefault();
					this.switchTrigger();
				}.bind(this));
			});
		}
	}

	initOSListener() {
		if (this.config.os_aware !== "1") return;

		const darkModeMedia = window.matchMedia("(prefers-color-scheme: dark)");
		darkModeMedia.addEventListener("change", (e) => {
			document.documentElement.classList.toggle("onyx-dark-mode", e.matches);
			this.saveDarkModeState();
		});
	}

	// ==========================
	//       OBSERVER SYSTEM
	// ==========================

	initObserver() {
		const setup = () => {
			if (!this.hasProcessRun) this.initProcesses();
			this.implementSecondaryBg();
			this.recheckOnCSSLoad();
		};

		document.readyState === "loading"
			? document.addEventListener("DOMContentLoaded", setup)
			: setup();

		//this.observer.observe(document, {childList: true, subtree: true});
		this.darkModeStatusChanged.observe(document.documentElement, {attributes: true});
	}

	// ==========================
	//       PROCESS ELEMENTS
	// ==========================

	initProcesses() {
		document.dispatchEvent(new CustomEvent("onyx_before_toggle"));
		this.hasProcessRun = true;
		document.querySelectorAll(
			"* :not(head, title, link, meta, script, style, defs, filter, .onyx-switch-trigger-block *, .onyx-menu-item *, .onyx-handled)"
		).forEach((el) => this.processElement(el));
		document.dispatchEvent(new CustomEvent("onyx_after_toggle"));
	}

	// ==========================
	//       ELEMENT LOGIC
	// ==========================
	processElement(element) {
		const computedStyle = window.getComputedStyle(element, null);
		const nodeName = element.nodeName.toLowerCase();

		// Reset style classes
		const styleClasses = [
			"onyx-change-all",
			"onyx-change-bg-txt",
			"onyx-change-bg-bdr",
			"onyx-change-txt-bdr",
			"onyx-change-bg",
			"onyx-change-txt",
			"onyx-change-border",
			"onyx-change-sec-bg",
			"onyx-handled",
			"onyx-is-link",
			"onyx-is-form-el",
			"onyx-is-button"
		];
		element.classList.remove(...styleClasses);

		// Extract style properties
		let backgroundColor = computedStyle.backgroundColor;
		const color = computedStyle.color;
		const borderColor = computedStyle.borderColor;
		const backgroundImage = computedStyle.backgroundImage;
		const getStyle = (element, pseudo) =>
			window.getComputedStyle(element, pseudo || null);
		const beforeBackgroundImage = getStyle(element, '::before').backgroundImage;
		const afterBackgroundImage = getStyle(element, '::after').backgroundImage;

		// Ensure body has a background color
		if (nodeName === "body" && this.isTransparent(backgroundColor)) {
			element.style.setProperty("background-color", "rgb(255, 255, 255)");
			backgroundColor = window.getComputedStyle(element, null).backgroundColor;
		}

		// Skip disallowed elements
		if (this.config.disallowed_elements.length && element.matches(this.config.disallowed_elements)) return;

		// Handle background images
		const hasBackgroundImageUrl = this.processBackgroundImage(element, backgroundImage);

		if (beforeBackgroundImage) {
			this.processBackgroundImage(element, beforeBackgroundImage, '::before');
		}

		if (afterBackgroundImage) {
			this.processBackgroundImage(element, afterBackgroundImage, '::after');
		}

		// Assign onyx-change-* classes
		this.assignStyleClass(element, backgroundColor, color, borderColor, hasBackgroundImageUrl);

		// Handle secondary background
		this.processSecondaryBackground(element, backgroundColor, hasBackgroundImageUrl);

		// Handle special element types
		if (nodeName === "a") element.classList.add("onyx-is-link");
		if (["input", "select", "textarea"].includes(nodeName)) element.classList.add("onyx-is-form-el");

		const isButton = nodeName === "button" || element.type === "submit" || this.config.allowed_btn_class.some(cls => element.classList.contains(cls));
		if (isButton) {
			element.classList.add("onyx-is-button");
			element.classList.remove("onyx-change-sec-bg", "onyx-change-all", "onyx-is-link");
		}

		// Handle alpha background
		this.processAlphaBackground(element, backgroundColor);

		// Media handling
		this.processMedia(element, nodeName);

		// Replacements
		this.processReplacements(element, nodeName);

		// Observe class changes
		setTimeout(() => {
			this.elementsClassChanged.observe(element, {attributes: true, attributeFilter: ["class"]});
		}, 0);

		element.classList.add("onyx-handled");
	}

	// ================= Helper Methods =================

	isTransparent(color) {
		return color === "rgba(0, 0, 0, 0)" || color === "rgba(255, 255, 255, 0)";
	}

	processBackgroundImage(element, backgroundImage, pseudo = '') {
		if (backgroundImage !== "none" && backgroundImage.includes("url")) {
			const cleanUrl = backgroundImage.replace(/^url\("?|"?\)$/g, "");
			if (cleanUrl && !cleanUrl.startsWith('linear-gradient') && this.config.bg_image_darken === "1") {
				if (pseudo == '') {
					element.dataset.onyxOriginal = cleanUrl;
				} else if (pseudo == '::before') {
					element.dataset.onyxOriginalBefore = cleanUrl;
				} else if (pseudo == '::after') {
					element.dataset.onyxOriginalAfter = cleanUrl;
				}
				this.darkenBgImage(element, this.darkenLevel, pseudo);
			}
			return true;
		}
		return false;
	}

	processSecondaryBackground(element, backgroundColor, hasBackgroundImageUrl) {
		if (!this.isTransparent(backgroundColor) && !hasBackgroundImageUrl) {
			if (!element.hasAttribute("data-sec-bg-finder")) {
				element.dataset.secBgFinder = backgroundColor;
			}

			if (this.secondaryBgColor && this.secondaryBgColor !== element.dataset.secBgFinder) {
				element.classList.add("onyx-change-sec-bg");
				delete element.dataset.secBgFinder;
			}
		}
	}

	processAlphaBackground(element, backgroundColor) {
		if (backgroundColor.includes("rgba") && parseFloat(backgroundColor.split(",")[3]) !== 0) {
			element.dataset.alphaBgColor = backgroundColor;
			this.fixBackgroundColorAlpha(element, backgroundColor);
		}
	}

	assignStyleClass(element, backgroundColor, color, borderColor, hasBackgroundImageUrl) {
		const isBg = !this.isTransparent(backgroundColor);
		const isColor = !this.isTransparent(color);
		const isBorder = !this.isTransparent(borderColor);

		if (isBg && isColor && isBorder && !hasBackgroundImageUrl) element.classList.add("onyx-change-all");
		else if (isBg && isColor && !hasBackgroundImageUrl) element.classList.add("onyx-change-bg-txt");
		else if (isBg && isBorder && !hasBackgroundImageUrl) element.classList.add("onyx-change-bg-bdr");
		else if (isColor && isBorder) element.classList.add("onyx-change-txt-bdr");
		else if (isBg && !hasBackgroundImageUrl) element.classList.add("onyx-change-bg");
		else if (isColor) element.classList.add("onyx-change-txt");
		else if (isBorder) element.classList.add("onyx-change-border");
	}

	processMedia(element, nodeName) {
		if (this.config.image_grayscale === "1" && nodeName === "img") this.imageFilter(element);
		if (this.config.invert_inline_svg === "1" && nodeName === "svg") this.invertSVG(element);
		if (this.config.video_grayscale !== "1") return;

		if (nodeName === "video" || (nodeName === "iframe" && /(youtube|vimeo|dailymotion)/.test(element.getAttribute("src")))) {
			this.videoFilter(element);
		}
	}

	processReplacements(element, nodeName) {
		// Replace images/videos
		if (Object.values(onyx_obj.image_replacements_arr).length && nodeName === "img") {
			this.replaceMedia(element, Object.values(onyx_obj.image_replacements_arr));
		}

		if (Object.values(onyx_obj.invert_images_arr).length && nodeName === "img") {
			this.invertMedia(element, Object.values(onyx_obj.invert_images_arr));
		}
	}



	// ==========================
	//         HELPERS
	// ==========================

	darkenBgImage(element, level, pseudo) {
		const html = document.documentElement;
		const isDark = html.classList.contains("onyx-dark-mode");
		const getStyle = (el, pseudo) => window.getComputedStyle(el, pseudo || null);

		const style = getStyle(element, pseudo || null);
		const bg = style.backgroundImage;

		if (!bg || bg === "none") return;

		if (isDark) {
			if (!bg.includes(`rgba(0, 0, 0, ${level})`)) {
				if (pseudo == '') {
					// Main element
					element.style.setProperty(
						"background-image",
						`linear-gradient(rgba(0, 0, 0, ${level}), rgba(0, 0, 0, ${level})), ${bg}`
					);
				} else {
					// Pseudo-elements :before and :after
					const styleId = `${pseudo === "::before" ? "onyx-before-" : "onyx-after-"}${Math.random().toString(36).substr(2, 9)}`;
					element.setAttribute("data-onyx-style-id", styleId);

					let styleElement = document.getElementById(styleId);
					if (!styleElement) {
						styleElement = document.createElement("style");
						styleElement.id = styleId;
						document.head.appendChild(styleElement);
					}

					styleElement.textContent = `
                        .onyx-dark-mode [data-onyx-style-id="${styleId}"]${pseudo} {
                            background-image: linear-gradient(rgba(0, 0, 0, ${level}), rgba(0, 0, 0, ${level})), ${bg} !important;
                        }
                    `;

					if (window.getComputedStyle(element).position === "static") {
						element.style.position = "relative";
					}
				}
			}
		} else {
			if (bg.includes(`rgba(0, 0, 0, ${level})`)) {
				const cleaned = bg.replace(`linear-gradient(rgba(0, 0, 0, ${level}), rgba(0, 0, 0, ${level})), `, "");
				if (pseudo === "") {
					element.style.setProperty("background-image", cleaned);
				} else {
					const styleId = element.getAttribute("data-onyx-style-id");
					const styleElement = document.getElementById(styleId);
					if (styleElement) styleElement.remove();
				}
			}
		}
	}

	imageFilter(img) {
		const isDark = document.documentElement.classList.contains("onyx-dark-mode");
		img.style.filter = isDark
			? `brightness(${this.config.image_brightness_to}%) grayscale(${this.config.image_grayscale_to}%)`
			: "";
	}

	invertSVG(svg) {
		const isDark = document.documentElement.classList.contains("onyx-dark-mode");
		svg.style.filter = isDark ? "invert(1)" : "";
	}

	videoFilter(video) {
		const isDark = document.documentElement.classList.contains("onyx-dark-mode");
		video.style.filter = isDark
			? `brightness(${this.config.video_brightness_to}%) grayscale(${this.config.video_grayscale_to}%)`
			: "";
	}

	fixBackgroundColorAlpha(element, backgroundColor) {
		const alphaValue = parseFloat(backgroundColor.split(",")[3]);
		const isDark = document.documentElement.classList.contains("onyx-dark-mode");
		if (isDark) {
			element.style.setProperty(
				"background-color",
				`rgba(0,0,0,${alphaValue})`,
				"important"
			);
		} else {
			element.style.removeProperty("background-color");
		}
	}

	implementSecondaryBg() {
		const elements = [...document.querySelectorAll("* :not(head, title, link, meta, script, style, defs, filter)")];
		let maxArea = 0;
		let maxColor = "";

		elements.forEach((el) => {
			const bg = el.dataset.secBgFinder;
			if (!bg || bg === "transparent" || bg === "rgba(0, 0, 0, 0)") return;
			const {width, height} = el.getBoundingClientRect();
			const area = width * height;
			if (area > maxArea) {
				maxArea = area;
				maxColor = bg;
			}
		});

		elements.forEach((el) => {
			if (el.hasAttribute("data-sec-bg-finder")) {
				if (maxColor && maxColor !== el.dataset.secBgFinder) {
					el.classList.add("onyx-change-sec-bg");
				}
				delete el.dataset.secBgFinder;
			}
		});

		this.secondaryBgColor = maxColor;
	}

	replaceMedia(element, mediaList) {
		const html = document.documentElement;
		const isDark = html.classList.contains("onyx-dark-mode");

		for (let i = 0; i < mediaList.length; i++) {
			const normalSrc = mediaList[i].org_image;
			const darkSrc = mediaList[i].dark_image;

			const normalPath = this.getPathName(normalSrc);
			const darkPath = this.getPathName(darkSrc);

			if (!normalPath || !darkPath) continue;

			// Determine which version should be shown
			const fromSrc = isDark ? normalPath : darkPath;
			const toSrc = isDark ? darkSrc : normalSrc;
			const replacedClass = "onyx-image-replaced";

			// Process <img> or elements with background images
			if (element.getAttribute("src") && element.getAttribute("src").includes(fromSrc)) {
				element.src = toSrc;
				element.classList.toggle(replacedClass, isDark);
			}

			if (element.getAttribute("srcset") && element.getAttribute("srcset").includes(fromSrc)) {
				element.srcset = toSrc;
				element.classList.toggle(replacedClass, isDark);
			}

			// Handle background images
			const bgImage = window.getComputedStyle(element, null).backgroundImage;
			if (bgImage && bgImage.includes(fromSrc)) {
				element.style.backgroundImage = `url('${toSrc}')`;
				element.classList.toggle(replacedClass, isDark);
			}
		}
	}

	invertMedia(element, mediaList) {
		const isDark = document.documentElement.classList.contains("onyx-dark-mode");
		for (let i = 0; i < mediaList.length; i++) {
			const imagePath = mediaList[i];
			if (element.getAttribute("src") && element.getAttribute("src").includes(imagePath)) {
				element.style.filter = isDark ? "invert(1)" : "";
			}
		}
	}

	getPathName(value) {
		try {
			return new URL(value).pathname;
		} catch {
			return '';
		}
	}

	recheckOnCSSLoad() {
		document.querySelectorAll(
			"* :not(head, title, link, meta, script, style, defs, filter, .onyx-switch-trigger-block *, .onyx-menu-item *, .onyx-handled)"
		).forEach((el) => this.processElement(el));
	}

	// ==========================
	//         CHECKERS
	// ==========================

	isDarkModeOn() {
		const lastState = localStorage.onyx_last_state ?? "not_set";
		return lastState === "1" || (lastState === "not_set" && this.config.default_dark_mode === "1");
	}

	// ==========================
	//         DARK MODE UPDATER
	// ==========================

	updateDarkModeElements() {
		const elements = document.querySelectorAll(
			"*:not(head, title, link, meta, script, style, defs, filter, .onyx-switch-trigger-block *, .onyx-menu-item *)"
		);
		elements.forEach((el) => {
			if (!el.classList.contains("onyx-handled")) return;

			if (this.config.disallowed_elements.length > 0 && el.matches(this.config.disallowed_elements)) return;

			const nodeName = el.nodeName.toLowerCase();

			if (el.hasAttribute('data-alpha-bg-color')) {
				this.fixBackgroundColorAlpha(el, el.dataset.alphaBgColor);
			}

			if (el.hasAttribute('data-onyx-original') && this.config.bg_image_darken === "1") {
				this.darkenBgImage(el, this.darkenLevel, '');
			}

			if (el.hasAttribute('data-onyx-original-before') && this.config.bg_image_darken === "1") {
				this.darkenBgImage(el, this.darkenLevel, '::before');
			}

			if (el.hasAttribute('data-onyx-original-after') && this.config.bg_image_darken === "1") {
				this.darkenBgImage(el, this.darkenLevel, '::after');
			}

			this.processReplacements(el, nodeName);

			this.processMedia(el, nodeName);
		});
	}
}

// ==========================
//        USAGE
// ==========================
const onyx = new OnyxDarkModeSwitcher({
	default_dark_mode: onyx_obj.enable_default_dark_mode == "on" ? "1" : "0",
	os_aware: onyx_obj.enable_os_aware == "on" ? "1" : "0",
	keyboard_shortcut: onyx_obj.enable_keyboard_shortcode == "on" ? "1" : "0",
	image_grayscale: onyx_obj.enable_image_grayscale == "on" ? "1" : "0",
	video_grayscale: onyx_obj.enable_video_grayscale == "on" ? "1" : "0",
	disallowed_elements: onyx_obj.disallowed_elements,
	allowed_btn_class: [onyx_obj.allowed_button_classes],
	bg_image_darken: onyx_obj.darken_background_images == "on" ? "1" : "0",
	bg_image_darken_to: onyx_obj.darken_level,
	invert_inline_svg: onyx_obj.invert_svg == "on" ? "1" : "0",
});

onyx.init();
