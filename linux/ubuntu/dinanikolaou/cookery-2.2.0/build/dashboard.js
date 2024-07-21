/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./src/components/Card/index.jsx":
/*!***************************************!*\
  !*** ./src/components/Card/index.jsx ***!
  \***************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var ___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! .. */ "./src/components/index.js");


function Card({
  cardList,
  cardPlace,
  cardCol
}) {
  const cardListing = card => {
    return card.map((carditem, index) => {
      return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
        className: "cw-cardbody",
        key: index
      }, carditem.iconSvg || carditem.imageurl && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
        className: "cw-icon"
      }, carditem.iconSvg && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
        className: "cw-icon-svg"
      }, carditem.iconSvg), carditem.imageurl && (carditem.headingUrl ? (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("a", {
        target: "_blank",
        href: carditem.headingUrl
      }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("img", {
        src: carditem.imageurl,
        className: "cw-img"
      })) : (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("img", {
        src: carditem.imageurl,
        className: "cw-img"
      }))), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
        className: "cw-text-wrap"
      }, carditem.heading && (carditem.headingUrl ? (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("a", {
        target: "_blank",
        href: carditem.headingUrl,
        className: "heading-link"
      }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("h3", {
        className: "cw-heading"
      }, carditem.heading)) : (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("h3", {
        className: "cw-heading"
      }, carditem.heading)), carditem.para && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("p", {
        className: "cw-text"
      }, carditem.para), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
        className: "cw-button"
      }, carditem.buttonUrl && carditem.buttonText && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("a", {
        href: carditem.buttonUrl,
        className: "cw-btn",
        target: "_blank"
      }, carditem.buttonText, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(___WEBPACK_IMPORTED_MODULE_1__.Icon, {
        icon: "arrow"
      })))), cardPlace === 'cw-pro' && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
        className: "cw-icon-two"
      }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
        className: "icon"
      }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(___WEBPACK_IMPORTED_MODULE_1__.Icon, {
        icon: "lock"
      }))));
    });
  };
  const classes = `cw-card ${cardPlace} ${cardCol}`;
  return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(react__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: classes
  }, cardListing(cardList)));
}
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (Card);

/***/ }),

/***/ "./src/components/Heading/index.jsx":
/*!******************************************!*\
  !*** ./src/components/Heading/index.jsx ***!
  \******************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ Heading)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var ___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! .. */ "./src/components/index.js");


function Heading({
  heading,
  buttonText,
  buttonUrl,
  openInNewTab
}) {
  return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "cw-settings"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("h2", null, heading), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "cw-button"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("a", {
    href: buttonUrl,
    className: "cw-btn",
    target: openInNewTab ? "_blank" : "_self"
  }, buttonText, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(___WEBPACK_IMPORTED_MODULE_1__.Icon, {
    icon: "arrow"
  }))));
}

/***/ }),

/***/ "./src/components/Icon/index.jsx":
/*!***************************************!*\
  !*** ./src/components/Icon/index.jsx ***!
  \***************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);

const icons = {
  globe: () => (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
    width: "20",
    height: "20",
    viewBox: "0 0 20 20",
    fill: "none",
    xmlns: "http://www.w3.org/2000/svg"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("g", {
    clipPath: "url(#clip0_2386_336)"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    d: "M10 1.6665C12.0844 3.94846 13.269 6.90987 13.3333 9.99984C13.269 13.0898 12.0844 16.0512 10 18.3332M10 1.6665C7.9156 3.94846 6.73104 6.90987 6.66667 9.99984C6.73104 13.0898 7.9156 16.0512 10 18.3332M10 1.6665C5.39763 1.6665 1.66667 5.39746 1.66667 9.99984C1.66667 14.6022 5.39763 18.3332 10 18.3332M10 1.6665C14.6024 1.6665 18.3333 5.39746 18.3333 9.99984C18.3333 14.6022 14.6024 18.3332 10 18.3332M2.08335 7.49984H17.9167M2.08334 12.4998H17.9167",
    stroke: "currentColor",
    strokeWidth: "1.67",
    stroklinecap: "round",
    strokeLinejoin: "round"
  })), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("defs", null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("clipPath", {
    id: "clip0_2386_336"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
    width: "20",
    height: "20"
  })))),
  site: () => (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
    width: "33",
    height: "32",
    viewBox: "0 0 33 32",
    fill: "none",
    xmlns: "http://www.w3.org/2000/svg"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
    x: "0.666687",
    width: "32",
    height: "32",
    rx: "8",
    fill: "url(#paint0_linear_2353_1212)"
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    d: "M9.16669 13.5H24.1667M14.1667 13.5L14.1667 23.5M13.1667 8.5H20.1667C21.5668 8.5 22.2669 8.5 22.8017 8.77248C23.2721 9.01217 23.6545 9.39462 23.8942 9.86502C24.1667 10.3998 24.1667 11.0999 24.1667 12.5V19.5C24.1667 20.9001 24.1667 21.6002 23.8942 22.135C23.6545 22.6054 23.2721 22.9878 22.8017 23.2275C22.2669 23.5 21.5668 23.5 20.1667 23.5H13.1667C11.7666 23.5 11.0665 23.5 10.5317 23.2275C10.0613 22.9878 9.67885 22.6054 9.43917 22.135C9.16669 21.6002 9.16669 20.9001 9.16669 19.5V12.5C9.16669 11.0999 9.16669 10.3998 9.43917 9.86502C9.67885 9.39462 10.0613 9.01217 10.5317 8.77248C11.0665 8.5 11.7666 8.5 13.1667 8.5Z",
    stroke: "white",
    strokeWidth: "1.67",
    stroklinecap: "round",
    strokeLinejoin: "round"
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("defs", null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("linearGradient", {
    id: "paint0_linear_2353_1212",
    x1: "3.00165",
    y1: "3.5",
    x2: "30.5016",
    y2: "30",
    gradientUnits: "userSpaceOnUse"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("stop", {
    stopColor: "#5081F5"
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("stop", {
    offset: "1",
    stopColor: "#A769F5"
  })))),
  colorsetting: () => (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
    width: "32",
    height: "32",
    viewBox: "0 0 32 32",
    fill: "none",
    xmlns: "http://www.w3.org/2000/svg"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
    width: "32",
    height: "32",
    rx: "8",
    fill: "url(#paint0_linear_2353_1220)"
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("g", {
    clipPath: "url(#clip0_2353_1220)"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    d: "M7.66669 16C7.66669 20.6024 11.3976 24.3334 16 24.3334C17.3807 24.3334 18.5 23.2141 18.5 21.8334V21.4167C18.5 21.0297 18.5 20.8362 18.5214 20.6737C18.6691 19.5519 19.5519 18.6691 20.6737 18.5214C20.8362 18.5 21.0297 18.5 21.4167 18.5H21.8334C23.2141 18.5 24.3334 17.3807 24.3334 16C24.3334 11.3976 20.6024 7.66669 16 7.66669C11.3976 7.66669 7.66669 11.3976 7.66669 16Z",
    stroke: "white",
    strokeWidth: "1.67",
    stroklinecap: "round",
    strokeLinejoin: "round"
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    d: "M11.8334 16.8334C12.2936 16.8334 12.6667 16.4603 12.6667 16C12.6667 15.5398 12.2936 15.1667 11.8334 15.1667C11.3731 15.1667 11 15.5398 11 16C11 16.4603 11.3731 16.8334 11.8334 16.8334Z",
    stroke: "white",
    strokeWidth: "1.67",
    stroklinecap: "round",
    strokeLinejoin: "round"
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    d: "M19.3334 13.5C19.7936 13.5 20.1667 13.1269 20.1667 12.6667C20.1667 12.2064 19.7936 11.8334 19.3334 11.8334C18.8731 11.8334 18.5 12.2064 18.5 12.6667C18.5 13.1269 18.8731 13.5 19.3334 13.5Z",
    stroke: "white",
    strokeWidth: "1.67",
    stroklinecap: "round",
    strokeLinejoin: "round"
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    d: "M14.3334 12.6667C14.7936 12.6667 15.1667 12.2936 15.1667 11.8334C15.1667 11.3731 14.7936 11 14.3334 11C13.8731 11 13.5 11.3731 13.5 11.8334C13.5 12.2936 13.8731 12.6667 14.3334 12.6667Z",
    stroke: "white",
    strokeWidth: "1.67",
    stroklinecap: "round",
    strokeLinejoin: "round"
  })), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("defs", null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("linearGradient", {
    id: "paint0_linear_2353_1220",
    x1: "2.33496",
    y1: "3.5",
    x2: "29.835",
    y2: "30",
    gradientUnits: "userSpaceOnUse"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("stop", {
    stopColor: "#F5B841"
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("stop", {
    offset: "1",
    stopColor: "#FF7830"
  })), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("clipPath", {
    id: "clip0_2353_1220"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
    width: "20",
    height: "20",
    fill: "white",
    transform: "translate(6 6)"
  })))),
  typographysetting: () => (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
    width: "33",
    height: "32",
    viewBox: "0 0 33 32",
    fill: "none",
    xmlns: "http://www.w3.org/2000/svg"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
    x: "0.333374",
    width: "32",
    height: "32",
    rx: "8",
    fill: "url(#paint0_linear_2353_1228)"
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    d: "M9.66669 11.8333C9.66669 11.0567 9.66669 10.6685 9.79355 10.3622C9.96271 9.95379 10.2872 9.62934 10.6955 9.46018C11.0018 9.33331 11.3901 9.33331 12.1667 9.33331H20.5C21.2766 9.33331 21.6649 9.33331 21.9712 9.46018C22.3795 9.62934 22.704 9.95379 22.8732 10.3622C23 10.6685 23 11.0567 23 11.8333M13 22.6666H19.6667M14.875 9.33331V22.6666M17.7917 9.33331V22.6666",
    stroke: "white",
    strokeWidth: "1.67",
    stroklinecap: "round",
    strokeLinejoin: "round"
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("defs", null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("linearGradient", {
    id: "paint0_linear_2353_1228",
    x1: "2.66833",
    y1: "3.5",
    x2: "30.1683",
    y2: "30",
    gradientUnits: "userSpaceOnUse"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("stop", {
    stopColor: "#FF0D76"
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("stop", {
    offset: "1",
    stopColor: "#590FB7"
  })))),
  layoutsetting: () => (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
    width: "33",
    height: "32",
    viewBox: "0 0 33 32",
    fill: "none",
    xmlns: "http://www.w3.org/2000/svg"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
    x: "0.666687",
    width: "32",
    height: "32",
    rx: "8",
    fill: "url(#paint0_linear_2353_1237)"
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    d: "M21.25 15.1667H17.0834M21.25 18.5H17.0834M21.25 11.8333H17.0834M14.1667 8.5L14.1667 23.5M13.1667 8.5H20.1667C21.5668 8.5 22.2669 8.5 22.8017 8.77248C23.2721 9.01217 23.6545 9.39462 23.8942 9.86502C24.1667 10.3998 24.1667 11.0999 24.1667 12.5V19.5C24.1667 20.9001 24.1667 21.6002 23.8942 22.135C23.6545 22.6054 23.2721 22.9878 22.8017 23.2275C22.2669 23.5 21.5668 23.5 20.1667 23.5H13.1667C11.7666 23.5 11.0665 23.5 10.5317 23.2275C10.0613 22.9878 9.67885 22.6054 9.43917 22.135C9.16669 21.6002 9.16669 20.9001 9.16669 19.5V12.5C9.16669 11.0999 9.16669 10.3998 9.43917 9.86502C9.67885 9.39462 10.0613 9.01217 10.5317 8.77248C11.0665 8.5 11.7666 8.5 13.1667 8.5Z",
    stroke: "white",
    strokeWidth: "1.67",
    stroklinecap: "round",
    strokeLinejoin: "round"
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("defs", null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("linearGradient", {
    id: "paint0_linear_2353_1237",
    x1: "3.00165",
    y1: "3.5",
    x2: "30.5016",
    y2: "30",
    gradientUnits: "userSpaceOnUse"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("stop", {
    stopColor: "#F40076"
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("stop", {
    offset: "1",
    stopColor: "#DF98FA"
  })))),
  frontpagesetting: () => (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
    width: "32",
    height: "32",
    viewBox: "0 0 32 32",
    fill: "none",
    xmlns: "http://www.w3.org/2000/svg"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
    width: "32",
    height: "32",
    rx: "8",
    fill: "url(#paint0_linear_2353_1245)"
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    d: "M24.3334 13.5H7.66669M17.6667 20.5833L19.75 18.5L17.6667 16.4167M14.3334 16.4167L12.25 18.5L14.3334 20.5833M7.66669 12.5L7.66669 19.5C7.66669 20.9001 7.66669 21.6002 7.93917 22.135C8.17885 22.6054 8.56131 22.9878 9.03171 23.2275C9.56649 23.5 10.2666 23.5 11.6667 23.5H20.3334C21.7335 23.5 22.4336 23.5 22.9683 23.2275C23.4387 22.9878 23.8212 22.6054 24.0609 22.135C24.3334 21.6002 24.3334 20.9001 24.3334 19.5V12.5C24.3334 11.0999 24.3334 10.3998 24.0609 9.86502C23.8212 9.39462 23.4387 9.01217 22.9683 8.77248C22.4336 8.5 21.7335 8.5 20.3334 8.5L11.6667 8.5C10.2666 8.5 9.56649 8.5 9.03171 8.77248C8.56131 9.01217 8.17885 9.39462 7.93917 9.86502C7.66669 10.3998 7.66669 11.0999 7.66669 12.5Z",
    stroke: "white",
    strokeWidth: "1.67",
    stroklinecap: "round",
    strokeLinejoin: "round"
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("defs", null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("linearGradient", {
    id: "paint0_linear_2353_1245",
    x1: "2.33496",
    y1: "3.5",
    x2: "29.835",
    y2: "30",
    gradientUnits: "userSpaceOnUse"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("stop", {
    stopColor: "#AFD759"
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("stop", {
    offset: "1",
    stopColor: "#00B3CC"
  })))),
  generalsetting: () => (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
    width: "33",
    height: "32",
    viewBox: "0 0 33 32",
    fill: "none",
    xmlns: "http://www.w3.org/2000/svg"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
    x: "0.333374",
    width: "32",
    height: "32",
    rx: "8",
    fill: "url(#paint0_linear_2353_1253)"
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    d: "M14.1626 22.1426L14.6497 23.2379C14.7944 23.564 15.0307 23.841 15.3298 24.0355C15.629 24.2299 15.9781 24.3334 16.3348 24.3333C16.6916 24.3334 17.0407 24.2299 17.3398 24.0355C17.639 23.841 17.8752 23.564 18.02 23.2379L18.5071 22.1426C18.6804 21.7539 18.9721 21.4298 19.3404 21.2166C19.711 21.0028 20.1398 20.9117 20.5654 20.9564L21.7571 21.0833C22.1118 21.1208 22.4698 21.0546 22.7876 20.8927C23.1055 20.7308 23.3695 20.4802 23.5478 20.1713C23.7263 19.8625 23.8113 19.5085 23.7926 19.1524C23.7738 18.7962 23.6521 18.4531 23.4422 18.1648L22.7367 17.1953C22.4855 16.8476 22.3512 16.429 22.3534 16C22.3533 15.5721 22.4888 15.1553 22.7404 14.8092L23.4459 13.8398C23.6558 13.5514 23.7775 13.2084 23.7963 12.8522C23.815 12.496 23.73 12.1421 23.5515 11.8333C23.3733 11.5243 23.1092 11.2737 22.7913 11.1118C22.4735 10.9499 22.1155 10.8837 21.7608 10.9213L20.5691 11.0481C20.1435 11.0928 19.7148 11.0017 19.3441 10.7879C18.975 10.5735 18.6833 10.2478 18.5108 9.85737L18.02 8.762C17.8752 8.43594 17.639 8.15889 17.3398 7.96446C17.0407 7.77003 16.6916 7.66657 16.3348 7.66663C15.9781 7.66657 15.629 7.77003 15.3298 7.96446C15.0307 8.15889 14.7944 8.43594 14.6497 8.762L14.1626 9.85737C13.9901 10.2478 13.6983 10.5735 13.3293 10.7879C12.9586 11.0017 12.5298 11.0928 12.1043 11.0481L10.9089 10.9213C10.5542 10.8837 10.1962 10.9499 9.87834 11.1118C9.56049 11.2737 9.29643 11.5243 9.11817 11.8333C8.93969 12.1421 8.85466 12.496 8.87339 12.8522C8.89213 13.2084 9.01383 13.5514 9.22373 13.8398L9.92928 14.8092C10.1809 15.1553 10.3164 15.5721 10.3163 16C10.3164 16.4278 10.1809 16.8447 9.92928 17.1907L9.22373 18.1601C9.01383 18.4485 8.89213 18.7916 8.87339 19.1477C8.85466 19.5039 8.93969 19.8578 9.11817 20.1666C9.2966 20.4754 9.5607 20.7259 9.8785 20.8878C10.1963 21.0496 10.5542 21.1159 10.9089 21.0787L12.1006 20.9518C12.5261 20.9071 12.9549 20.9982 13.3256 21.212C13.696 21.4258 13.9891 21.7516 14.1626 22.1426Z",
    stroke: "white",
    strokeWidth: "1.67",
    stroklinecap: "round",
    strokeLinejoin: "round"
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    d: "M16.3333 18.5C17.7141 18.5 18.8333 17.3807 18.8333 16C18.8333 14.6192 17.7141 13.5 16.3333 13.5C14.9526 13.5 13.8333 14.6192 13.8333 16C13.8333 17.3807 14.9526 18.5 16.3333 18.5Z",
    stroke: "white",
    strokeWidth: "1.67",
    stroklinecap: "round",
    strokeLinejoin: "round"
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("defs", null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("linearGradient", {
    id: "paint0_linear_2353_1253",
    x1: "2.66833",
    y1: "3.5",
    x2: "30.1683",
    y2: "30",
    gradientUnits: "userSpaceOnUse"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("stop", {
    stopColor: "#ED7B84"
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("stop", {
    offset: "1",
    stopColor: "#9055FF"
  })))),
  instagramsetting: () => (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
    width: "33",
    height: "32",
    viewBox: "0 0 33 32",
    fill: "none",
    xmlns: "http://www.w3.org/2000/svg"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
    x: "0.666687",
    width: "32",
    height: "32",
    rx: "8",
    fill: "url(#paint0_linear_2353_1262)"
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    d: "M13.1667 7.66663H20.1667C22.8334 7.66663 25 9.83329 25 12.5V19.5C25 20.7818 24.4908 22.0112 23.5844 22.9176C22.678 23.8241 21.4486 24.3333 20.1667 24.3333H13.1667C10.5 24.3333 8.33337 22.1666 8.33337 19.5V12.5C8.33337 11.2181 8.8426 9.9887 9.74902 9.08228C10.6555 8.17585 11.8848 7.66663 13.1667 7.66663ZM13 9.33329C12.2044 9.33329 11.4413 9.64936 10.8787 10.212C10.3161 10.7746 10 11.5376 10 12.3333V19.6666C10 21.325 11.3417 22.6666 13 22.6666H20.3334C21.129 22.6666 21.8921 22.3506 22.4547 21.7879C23.0173 21.2253 23.3334 20.4623 23.3334 19.6666V12.3333C23.3334 10.675 21.9917 9.33329 20.3334 9.33329H13ZM21.0417 10.5833C21.318 10.5833 21.5829 10.693 21.7783 10.8884C21.9736 11.0837 22.0834 11.3487 22.0834 11.625C22.0834 11.9012 21.9736 12.1662 21.7783 12.3615C21.5829 12.5569 21.318 12.6666 21.0417 12.6666C20.7654 12.6666 20.5005 12.5569 20.3051 12.3615C20.1098 12.1662 20 11.9012 20 11.625C20 11.3487 20.1098 11.0837 20.3051 10.8884C20.5005 10.693 20.7654 10.5833 21.0417 10.5833ZM16.6667 11.8333C17.7718 11.8333 18.8316 12.2723 19.613 13.0537C20.3944 13.8351 20.8334 14.8949 20.8334 16C20.8334 17.105 20.3944 18.1648 19.613 18.9462C18.8316 19.7276 17.7718 20.1666 16.6667 20.1666C15.5616 20.1666 14.5018 19.7276 13.7204 18.9462C12.939 18.1648 12.5 17.105 12.5 16C12.5 14.8949 12.939 13.8351 13.7204 13.0537C14.5018 12.2723 15.5616 11.8333 16.6667 11.8333ZM16.6667 13.5C16.0037 13.5 15.3678 13.7634 14.8989 14.2322C14.4301 14.701 14.1667 15.3369 14.1667 16C14.1667 16.663 14.4301 17.2989 14.8989 17.7677C15.3678 18.2366 16.0037 18.5 16.6667 18.5C17.3297 18.5 17.9656 18.2366 18.4345 17.7677C18.9033 17.2989 19.1667 16.663 19.1667 16C19.1667 15.3369 18.9033 14.701 18.4345 14.2322C17.9656 13.7634 17.3297 13.5 16.6667 13.5Z",
    fill: "white"
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("defs", null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("linearGradient", {
    id: "paint0_linear_2353_1262",
    x1: "3.00165",
    y1: "3.5",
    x2: "30.5016",
    y2: "30",
    gradientUnits: "userSpaceOnUse"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("stop", {
    stopColor: "#E233FF"
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("stop", {
    offset: "1",
    stopColor: "#FF6B00"
  })))),
  socialmedia: () => (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
    width: "32",
    height: "32",
    viewBox: "0 0 32 32",
    fill: "none",
    xmlns: "http://www.w3.org/2000/svg"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
    width: "32",
    height: "32",
    rx: "8",
    fill: "url(#paint0_linear_2353_1270)"
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    d: "M13.1583 17.2583L18.85 20.575M18.8417 11.425L13.1583 14.7416M23.5 10.1666C23.5 11.5473 22.3807 12.6666 21 12.6666C19.6193 12.6666 18.5 11.5473 18.5 10.1666C18.5 8.78591 19.6193 7.66663 21 7.66663C22.3807 7.66663 23.5 8.78591 23.5 10.1666ZM13.5 16C13.5 17.3807 12.3807 18.5 11 18.5C9.61929 18.5 8.5 17.3807 8.5 16C8.5 14.6192 9.61929 13.5 11 13.5C12.3807 13.5 13.5 14.6192 13.5 16ZM23.5 21.8333C23.5 23.214 22.3807 24.3333 21 24.3333C19.6193 24.3333 18.5 23.214 18.5 21.8333C18.5 20.4526 19.6193 19.3333 21 19.3333C22.3807 19.3333 23.5 20.4526 23.5 21.8333Z",
    stroke: "white",
    strokeWidth: "1.67",
    stroklinecap: "round",
    strokeLinejoin: "round"
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("defs", null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("linearGradient", {
    id: "paint0_linear_2353_1270",
    x1: "2.33496",
    y1: "3.5",
    x2: "29.835",
    y2: "30",
    gradientUnits: "userSpaceOnUse"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("stop", {
    stopColor: "#2F80ED"
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("stop", {
    offset: "1",
    stopColor: "#B2FFDA"
  })))),
  footersetting: () => (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
    width: "33",
    height: "32",
    viewBox: "0 0 33 32",
    fill: "none",
    xmlns: "http://www.w3.org/2000/svg"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
    x: "0.333374",
    width: "32",
    height: "32",
    rx: "8",
    fill: "url(#paint0_linear_2353_1278)"
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    d: "M8.83337 8.5H8.84171M8.83337 16H8.84171M8.83337 19.75H8.84171M8.83337 12.25H8.84171M12.5834 8.5H12.5917M12.5834 16H12.5917M20.0834 8.5H20.0917M20.0834 16H20.0917M16.3334 8.5H16.3417M16.3334 16H16.3417M16.3334 19.75H16.3417M16.3334 12.25H16.3417M23.8334 8.5H23.8417M23.8334 16H23.8417M23.8334 19.75H23.8417M23.8334 12.25H23.8417M23.8334 23.5H8.83337",
    stroke: "white",
    strokeWidth: "1.67",
    strokeLinecap: "round",
    strokeLinejoin: "round"
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("defs", null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("linearGradient", {
    id: "paint0_linear_2353_1278",
    x1: "2.66833",
    y1: "3.5",
    x2: "30.1683",
    y2: "30",
    gradientUnits: "userSpaceOnUse"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("stop", {
    stopColor: "#DF98FA"
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("stop", {
    offset: "1",
    stopColor: "#9055FF"
  })))),
  home: () => (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
    width: "20",
    height: "20",
    viewBox: "0 0 20 20",
    fill: "none",
    xmlns: "http://www.w3.org/2000/svg"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    d: "M2.5 8.80433C2.5 8.3257 2.5 8.08639 2.56169 7.866C2.61633 7.67078 2.70614 7.48716 2.82669 7.32417C2.96278 7.14017 3.15168 6.99324 3.52949 6.69939L9.18141 2.30345C9.47418 2.07574 9.62057 1.96189 9.78221 1.91812C9.92484 1.87951 10.0752 1.87951 10.2178 1.91812C10.3794 1.96189 10.5258 2.07574 10.8186 2.30345L16.4705 6.69939C16.8483 6.99324 17.0372 7.14017 17.1733 7.32417C17.2939 7.48716 17.3837 7.67078 17.4383 7.866C17.5 8.08639 17.5 8.3257 17.5 8.80433V14.8334C17.5 15.7669 17.5 16.2336 17.3183 16.5901C17.1586 16.9037 16.9036 17.1587 16.59 17.3185C16.2335 17.5001 15.7668 17.5001 14.8333 17.5001H5.16667C4.23325 17.5001 3.76654 17.5001 3.41002 17.3185C3.09641 17.1587 2.84144 16.9037 2.68166 16.5901C2.5 16.2336 2.5 15.7669 2.5 14.8334V8.80433Z",
    stroke: "currentColor",
    strokeWidth: "1.67",
    stroklinecap: "round",
    strokeLinejoin: "round"
  })),
  freePro: () => (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
    width: "20",
    height: "20",
    viewBox: "0 0 20 20",
    fill: "none",
    xmlns: "http://www.w3.org/2000/svg"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("g", {
    clipPath: "url(#clip0_2386_343)"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    d: "M10 1.6665L13 4.6665C15 -0.583496 20.5833 4.99984 15.3333 6.99984L18.3333 9.99984L15.3333 12.9998C13.3333 7.74984 7.75001 13.3332 13 15.3332L10 18.3332L7 15.3332C5 20.5832 -0.583328 14.9998 4.66667 12.9998L1.66667 9.99984L4.66667 6.99984C6.66667 12.2498 12.25 6.6665 7 4.6665L10 1.6665Z",
    stroke: "currentColor",
    strokeWidth: "1.67",
    strokeLinecap: "round",
    strokeLinejoin: "round"
  })), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("defs", null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("clipPath", {
    id: "clip0_2386_343"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
    width: "20",
    height: "20",
    fill: "none"
  })))),
  offers: () => (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
    width: "20",
    height: "20",
    viewBox: "0 0 20 20",
    fill: "none",
    xmlns: "http://www.w3.org/2000/svg"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    d: "M6.66667 6.6665H6.67501M1.66667 4.33317L1.66667 8.06193C1.66667 8.46958 1.66667 8.67341 1.71272 8.86522C1.75355 9.03528 1.82089 9.19786 1.91227 9.34698C2.01534 9.51517 2.15947 9.6593 2.44772 9.94755L8.83824 16.3381C9.82829 17.3281 10.3233 17.8231 10.8941 18.0086C11.3962 18.1718 11.9371 18.1718 12.4392 18.0086C13.01 17.8231 13.5051 17.3281 14.4951 16.3381L16.3382 14.4949C17.3283 13.5049 17.8233 13.0099 18.0088 12.439C18.1719 11.9369 18.1719 11.3961 18.0088 10.894C17.8233 10.3231 17.3283 9.82812 16.3382 8.83808L9.94772 2.44755C9.65947 2.1593 9.51534 2.01517 9.34715 1.9121C9.19802 1.82072 9.03545 1.75338 8.86539 1.71255C8.67358 1.6665 8.46975 1.6665 8.0621 1.6665L4.33334 1.6665C3.39992 1.6665 2.93321 1.6665 2.57669 1.84816C2.26308 2.00795 2.00812 2.26292 1.84833 2.57652C1.66667 2.93304 1.66667 3.39975 1.66667 4.33317ZM7.08334 6.6665C7.08334 6.89662 6.89679 7.08317 6.66667 7.08317C6.43655 7.08317 6.25001 6.89662 6.25001 6.6665C6.25001 6.43639 6.43655 6.24984 6.66667 6.24984C6.89679 6.24984 7.08334 6.43639 7.08334 6.6665Z",
    stroke: "currentColor",
    strokeWidth: "1.67",
    strokeLinecap: "round",
    strokeLinejoin: "round"
  })),
  plugins: () => (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
    width: "20",
    height: "20",
    viewBox: "0 0 20 20",
    fill: "none",
    xmlns: "http://www.w3.org/2000/svg"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    d: "M18.7883 4.96168C18.7012 4.87428 18.5977 4.80494 18.4837 4.75762C18.3698 4.7103 18.2476 4.68595 18.1242 4.68595C18.0008 4.68595 17.8787 4.7103 17.7647 4.75762C17.6508 4.80494 17.5473 4.87428 17.4602 4.96168L15 7.42184L12.5781 4.99997L15.0406 2.53825C15.2168 2.36213 15.3157 2.12326 15.3157 1.87418C15.3157 1.62511 15.2168 1.38624 15.0406 1.21012C14.8645 1.034 14.6256 0.935059 14.3766 0.935059C14.1275 0.935059 13.8886 1.034 13.7125 1.21012L11.25 3.67184L9.41329 1.83668C9.32608 1.74948 9.22255 1.6803 9.10861 1.63311C8.99467 1.58591 8.87255 1.56162 8.74922 1.56162C8.50015 1.56162 8.26128 1.66056 8.08516 1.83668C7.90904 2.01281 7.8101 2.25168 7.8101 2.50075C7.8101 2.74982 7.90904 2.98869 8.08516 3.16481L8.35938 3.43747L4.44454 7.35465C4.12528 7.67386 3.87203 8.05283 3.69925 8.46992C3.52647 8.88701 3.43754 9.33405 3.43754 9.78551C3.43754 10.237 3.52647 10.684 3.69925 11.1011C3.87203 11.5182 4.12528 11.8972 4.44454 12.2164L5.45079 13.2226L1.83672 16.8367C1.74952 16.9239 1.68034 17.0274 1.63315 17.1414C1.58595 17.2553 1.56166 17.3774 1.56166 17.5007C1.56166 17.6241 1.58595 17.7462 1.63315 17.8601C1.68034 17.9741 1.74952 18.0776 1.83672 18.1648C2.01284 18.3409 2.25172 18.4399 2.50079 18.4399C2.62411 18.4399 2.74624 18.4156 2.86018 18.3684C2.97412 18.3212 3.07764 18.252 3.16485 18.1648L6.77891 14.5507L7.78516 15.557C8.10437 15.8763 8.48334 16.1295 8.90043 16.3023C9.31752 16.4751 9.76456 16.564 10.216 16.564C10.6675 16.564 11.1145 16.4751 11.5316 16.3023C11.9487 16.1295 12.3277 15.8763 12.6469 15.557L16.5625 11.6406L16.8367 11.9156C16.9239 12.0028 17.0275 12.072 17.1414 12.1192C17.2553 12.1664 17.3775 12.1907 17.5008 12.1907C17.6241 12.1907 17.7462 12.1664 17.8602 12.1192C17.9741 12.072 18.0776 12.0028 18.1648 11.9156C18.2521 11.8284 18.3212 11.7249 18.3684 11.6109C18.4156 11.497 18.4399 11.3749 18.4399 11.2515C18.4399 11.1282 18.4156 11.0061 18.3684 10.8921C18.3212 10.7782 18.2521 10.6747 18.1648 10.5875L16.3281 8.74997L18.7906 6.28825C18.8776 6.20102 18.9466 6.09751 18.9936 5.98361C19.0406 5.86972 19.0646 5.74768 19.0644 5.62448C19.0642 5.50128 19.0397 5.37933 18.9923 5.2656C18.9449 5.15187 18.8756 5.0486 18.7883 4.96168ZM11.3195 14.2297C11.1744 14.3748 11.0022 14.49 10.8125 14.5685C10.6229 14.6471 10.4197 14.6875 10.2145 14.6875C10.0092 14.6875 9.80598 14.6471 9.61637 14.5685C9.42676 14.49 9.25448 14.3748 9.10938 14.2297L5.77032 10.8906C5.62516 10.7455 5.51001 10.5732 5.43145 10.3836C5.35288 10.194 5.31245 9.99076 5.31245 9.78551C5.31245 9.58027 5.35288 9.37704 5.43145 9.18742C5.51001 8.99781 5.62516 8.82553 5.77032 8.68043L9.68751 4.76559L15.2344 10.3125L11.3195 14.2297Z",
    fill: "currentColor"
  })),
  license: () => (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
    width: "20",
    height: "20",
    viewBox: "0 0 20 20",
    fill: "none",
    xmlns: "http://www.w3.org/2000/svg"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    d: "M5.41667 16.6665H4.16667C3.24619 16.6665 2.5 15.9203 2.5 14.9998V3.33317C2.5 2.4127 3.24619 1.6665 4.16667 1.6665H15.8333C16.7538 1.6665 17.5 2.4127 17.5 3.33317V14.9998C17.5 15.9203 16.7538 16.6665 15.8333 16.6665H14.5833M10 15.8332C11.3807 15.8332 12.5 14.7139 12.5 13.3332C12.5 11.9525 11.3807 10.8332 10 10.8332C8.61929 10.8332 7.5 11.9525 7.5 13.3332C7.5 14.7139 8.61929 15.8332 10 15.8332ZM10 15.8332L10.0179 15.833L7.35723 18.4936L5.0002 16.1366L7.51638 13.6204M10 15.8332L12.6607 18.4936L15.0177 16.1366L12.5015 13.6204M7.5 4.99984H12.5M5.83333 7.9165H14.1667",
    stroke: "currentColor",
    strokeWidth: "1.67",
    strokeLinecap: "round",
    strokeLinejoin: "round"
  })),
  arrow: () => (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
    width: "13",
    height: "10",
    viewBox: "0 0 13 10",
    fill: "none",
    xmlns: "http://www.w3.org/2000/svg"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    d: "M1.16669 5H11.8334M11.8334 5L7.83335 1M11.8334 5L7.83335 9",
    stroke: "#6266EA",
    strokeWidth: "1.5",
    strokeLinecap: "round",
    strokeLinejoin: "round"
  })),
  youtube: () => (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
    width: "20",
    height: "20",
    viewBox: "0 0 20 20",
    fill: "none",
    xmlns: "http://www.w3.org/2000/svg"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    fillRule: "evenodd",
    clipRule: "evenodd",
    d: "M9.99996 3.3335C10.7125 3.3335 11.4433 3.35183 12.1516 3.38183L12.9883 3.42183L13.7891 3.46933L14.5391 3.52016L15.2241 3.5735C15.9675 3.63039 16.667 3.94762 17.1996 4.46936C17.7321 4.99111 18.0636 5.68395 18.1358 6.426L18.1691 6.78016L18.2316 7.5385C18.29 8.32433 18.3333 9.181 18.3333 10.0002C18.3333 10.8193 18.29 11.676 18.2316 12.4618L18.1691 13.2202C18.1583 13.3418 18.1475 13.4593 18.1358 13.5743C18.0636 14.3165 17.732 15.0095 17.1992 15.5312C16.6665 16.053 15.9668 16.3701 15.2233 16.4268L14.54 16.4793L13.79 16.531L12.9883 16.5785L12.1516 16.6185C11.4348 16.6496 10.7174 16.6658 9.99996 16.6668C9.28248 16.6658 8.5651 16.6496 7.84829 16.6185L7.01163 16.5785L6.21079 16.531L5.46079 16.4793L4.77579 16.4268C4.03242 16.3699 3.33292 16.0527 2.80035 15.531C2.26779 15.0092 1.93627 14.3164 1.86413 13.5743L1.83079 13.2202L1.76829 12.4618C1.70457 11.6428 1.67066 10.8217 1.66663 10.0002C1.66663 9.181 1.70996 8.32433 1.76829 7.5385L1.83079 6.78016C1.84163 6.6585 1.85246 6.541 1.86413 6.426C1.93624 5.68408 2.26764 4.99134 2.80004 4.46962C3.33243 3.94789 4.03173 3.63058 4.77496 3.5735L5.45913 3.52016L6.20913 3.46933L7.01079 3.42183L7.84746 3.38183C8.56454 3.35069 9.2822 3.33458 9.99996 3.3335ZM8.33329 7.97933V12.021C8.33329 12.406 8.74996 12.646 9.08329 12.4543L12.5833 10.4335C12.6595 10.3897 12.7227 10.3265 12.7667 10.2504C12.8107 10.1744 12.8338 10.088 12.8338 10.0002C12.8338 9.91229 12.8107 9.82596 12.7667 9.74988C12.7227 9.67381 12.6595 9.61067 12.5833 9.56683L9.08329 7.54683C9.00726 7.50293 8.92101 7.47983 8.83321 7.47984C8.74542 7.47986 8.65917 7.50299 8.58315 7.54691C8.50713 7.59083 8.44402 7.654 8.40016 7.73005C8.3563 7.8061 8.33324 7.89237 8.33329 7.98016V7.97933Z",
    fill: "currentColor"
  })),
  support: () => (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
    width: "20",
    height: "20",
    viewBox: "0 0 20 20",
    fill: "none",
    xmlns: "http://www.w3.org/2000/svg"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    d: "M8.33333 6.66853C8.48016 6.25113 8.76998 5.89917 9.15144 5.67498C9.53291 5.45079 9.98141 5.36884 10.4175 5.44364C10.8536 5.51844 11.2492 5.74517 11.5341 6.08367C11.8191 6.42217 11.975 6.8506 11.9744 7.29306C11.9744 8.54213 10.1008 9.16667 10.1008 9.16667M10.1249 11.6667H10.1333M5.83333 15V16.9463C5.83333 17.3903 5.83333 17.6123 5.92436 17.7263C6.00352 17.8255 6.12356 17.8832 6.25045 17.8831C6.39636 17.8829 6.56973 17.7442 6.91646 17.4668L8.90434 15.8765C9.31043 15.5517 9.51347 15.3892 9.73957 15.2737C9.94017 15.1712 10.1537 15.0963 10.3743 15.051C10.6231 15 10.8831 15 11.4031 15H13.5C14.9001 15 15.6002 15 16.135 14.7275C16.6054 14.4878 16.9878 14.1054 17.2275 13.635C17.5 13.1002 17.5 12.4001 17.5 11V6.5C17.5 5.09987 17.5 4.3998 17.2275 3.86502C16.9878 3.39462 16.6054 3.01217 16.135 2.77248C15.6002 2.5 14.9001 2.5 13.5 2.5H6.5C5.09987 2.5 4.3998 2.5 3.86502 2.77248C3.39462 3.01217 3.01217 3.39462 2.77248 3.86502C2.5 4.3998 2.5 5.09987 2.5 6.5V11.6667C2.5 12.4416 2.5 12.8291 2.58519 13.147C2.81635 14.0098 3.49022 14.6836 4.35295 14.9148C4.67087 15 5.05836 15 5.83333 15Z",
    stroke: "currentColor",
    strokeWidth: "1.67",
    strokeLinecap: "round",
    strokeLinejoin: "round"
  })),
  doc: () => (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
    width: "20",
    height: "20",
    viewBox: "0 0 20 20",
    fill: "none",
    xmlns: "http://www.w3.org/2000/svg"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
    width: "20",
    height: "20",
    fill: "none"
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    d: "M3.33337 1.6665H10.8334L16.6667 7.49984V18.3332H3.33337V1.6665Z",
    stroke: "currentColor",
    strokeWidth: "1.67",
    strokeLinecap: "round",
    strokeLinejoin: "round"
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    d: "M10.8334 1.6665V7.49984H16.6667",
    stroke: "currentColor",
    strokeWidth: "1.67",
    strokeLinecap: "round",
    strokeLinejoin: "round"
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    d: "M6.66663 11.6665H13.3333",
    stroke: "currentColor",
    strokeWidth: "1.67",
    strokeLinecap: "round"
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    d: "M6.66663 15H9.99996",
    stroke: "currentColor",
    strokeWidth: "1.67",
    strokeLinecap: "round"
  })),
  lock: () => (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
    width: "17",
    height: "21",
    viewBox: "0 0 17 21",
    fill: "none",
    xmlns: "http://www.w3.org/2000/svg"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    d: "M2.82456 21C2.29061 21 1.83352 20.8042 1.45329 20.4125C1.07305 20.0208 0.882935 19.55 0.882935 19V9C0.882935 8.45 1.07305 7.97917 1.45329 7.5875C1.83352 7.19583 2.29061 7 2.82456 7H3.79538V5C3.79538 3.61667 4.26865 2.4375 5.21519 1.4625C6.16174 0.4875 7.30649 0 8.64945 0C9.99241 0 11.1372 0.4875 12.0837 1.4625C13.0302 2.4375 13.5035 3.61667 13.5035 5V7H14.4743C15.0083 7 15.4654 7.19583 15.8456 7.5875C16.2258 7.97917 16.416 8.45 16.416 9V19C16.416 19.55 16.2258 20.0208 15.8456 20.4125C15.4654 20.8042 15.0083 21 14.4743 21H2.82456ZM2.82456 19H14.4743V9H2.82456V19ZM8.64945 16C9.1834 16 9.64049 15.8042 10.0207 15.4125C10.401 15.0208 10.5911 14.55 10.5911 14C10.5911 13.45 10.401 12.9792 10.0207 12.5875C9.64049 12.1958 9.1834 12 8.64945 12C8.1155 12 7.65841 12.1958 7.27817 12.5875C6.89794 12.9792 6.70782 13.45 6.70782 14C6.70782 14.55 6.89794 15.0208 7.27817 15.4125C7.65841 15.8042 8.1155 16 8.64945 16ZM5.73701 7H11.5619V5C11.5619 4.16667 11.2787 3.45833 10.7124 2.875C10.1461 2.29167 9.45846 2 8.64945 2C7.84044 2 7.15278 2.29167 6.58647 2.875C6.02016 3.45833 5.73701 4.16667 5.73701 5V7Z",
    fill: "#D9D9D9"
  })),
  documentation: () => (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
    width: "16",
    height: "20",
    viewBox: "0 0 16 20",
    fill: "none",
    xmlns: "http://www.w3.org/2000/svg"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    d: "M9.66671 9.1665H4.66671M6.33337 12.4998H4.66671M11.3334 5.83317H4.66671M14.6667 5.6665V14.3332C14.6667 15.7333 14.6667 16.4334 14.3942 16.9681C14.1545 17.4385 13.7721 17.821 13.3017 18.0607C12.7669 18.3332 12.0668 18.3332 10.6667 18.3332H5.33337C3.93324 18.3332 3.23318 18.3332 2.6984 18.0607C2.22799 17.821 1.84554 17.4385 1.60586 16.9681C1.33337 16.4334 1.33337 15.7333 1.33337 14.3332V5.6665C1.33337 4.26637 1.33337 3.56631 1.60586 3.03153C1.84554 2.56112 2.22799 2.17867 2.6984 1.93899C3.23318 1.6665 3.93324 1.6665 5.33337 1.6665H10.6667C12.0668 1.6665 12.7669 1.6665 13.3017 1.93899C13.7721 2.17867 14.1545 2.56112 14.3942 3.03153C14.6667 3.56631 14.6667 4.26637 14.6667 5.6665Z",
    stroke: "currentColor",
    strokeWidth: "1.67",
    strokeLinecap: "round",
    strokeLinejoin: "round"
  })),
  supportTwo: () => (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
    width: "18",
    height: "14",
    viewBox: "0 0 18 14",
    fill: "none",
    xmlns: "http://www.w3.org/2000/svg"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    d: "M8.99996 11.1668C9.23607 11.1668 9.43399 11.087 9.59371 10.9272C9.75343 10.7675 9.83329 10.5696 9.83329 10.3335C9.83329 10.0974 9.75343 9.89947 9.59371 9.73975C9.43399 9.58002 9.23607 9.50016 8.99996 9.50016C8.76385 9.50016 8.56593 9.58002 8.40621 9.73975C8.24649 9.89947 8.16662 10.0974 8.16662 10.3335C8.16662 10.5696 8.24649 10.7675 8.40621 10.9272C8.56593 11.087 8.76385 11.1668 8.99996 11.1668ZM8.99996 7.8335C9.23607 7.8335 9.43399 7.75363 9.59371 7.59391C9.75343 7.43419 9.83329 7.23627 9.83329 7.00016C9.83329 6.76405 9.75343 6.56613 9.59371 6.40641C9.43399 6.24669 9.23607 6.16683 8.99996 6.16683C8.76385 6.16683 8.56593 6.24669 8.40621 6.40641C8.24649 6.56613 8.16662 6.76405 8.16662 7.00016C8.16662 7.23627 8.24649 7.43419 8.40621 7.59391C8.56593 7.75363 8.76385 7.8335 8.99996 7.8335ZM8.99996 4.50016C9.23607 4.50016 9.43399 4.4203 9.59371 4.26058C9.75343 4.10086 9.83329 3.90294 9.83329 3.66683C9.83329 3.43072 9.75343 3.2328 9.59371 3.07308C9.43399 2.91336 9.23607 2.8335 8.99996 2.8335C8.76385 2.8335 8.56593 2.91336 8.40621 3.07308C8.24649 3.2328 8.16662 3.43072 8.16662 3.66683C8.16662 3.90294 8.24649 4.10086 8.40621 4.26058C8.56593 4.4203 8.76385 4.50016 8.99996 4.50016ZM15.6666 13.6668H2.33329C1.87496 13.6668 1.4826 13.5036 1.15621 13.1772C0.82982 12.8509 0.666626 12.4585 0.666626 12.0002V8.66683C1.12496 8.66683 1.51732 8.50363 1.84371 8.17725C2.1701 7.85086 2.33329 7.4585 2.33329 7.00016C2.33329 6.54183 2.1701 6.14947 1.84371 5.82308C1.51732 5.49669 1.12496 5.3335 0.666626 5.3335V2.00016C0.666626 1.54183 0.82982 1.14947 1.15621 0.823079C1.4826 0.496691 1.87496 0.333496 2.33329 0.333496H15.6666C16.125 0.333496 16.5173 0.496691 16.8437 0.823079C17.1701 1.14947 17.3333 1.54183 17.3333 2.00016V5.3335C16.875 5.3335 16.4826 5.49669 16.1562 5.82308C15.8298 6.14947 15.6666 6.54183 15.6666 7.00016C15.6666 7.4585 15.8298 7.85086 16.1562 8.17725C16.4826 8.50363 16.875 8.66683 17.3333 8.66683V12.0002C17.3333 12.4585 17.1701 12.8509 16.8437 13.1772C16.5173 13.5036 16.125 13.6668 15.6666 13.6668ZM15.6666 12.0002V9.87516C15.1527 9.56961 14.7465 9.16336 14.4479 8.65641C14.1493 8.14947 14 7.59738 14 7.00016C14 6.40294 14.1493 5.85086 14.4479 5.34391C14.7465 4.83697 15.1527 4.43072 15.6666 4.12516V2.00016H2.33329V4.12516C2.84718 4.43072 3.25343 4.83697 3.55204 5.34391C3.85065 5.85086 3.99996 6.40294 3.99996 7.00016C3.99996 7.59738 3.85065 8.14947 3.55204 8.65641C3.25343 9.16336 2.84718 9.56961 2.33329 9.87516V12.0002H15.6666Z",
    fill: "#F8478D"
  })),
  video: () => (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
    width: "22",
    height: "22",
    viewBox: "0 0 22 22",
    fill: "none",
    xmlns: "http://www.w3.org/2000/svg"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    d: "M11 21C16.5228 21 21 16.5228 21 11C21 5.47715 16.5228 1 11 1C5.47715 1 1 5.47715 1 11C1 16.5228 5.47715 21 11 21Z",
    stroke: "#F8478D",
    strokeWidth: "2",
    strokeLinecap: "round",
    strokeLinejoin: "round"
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    d: "M8.5 7.96533C8.5 7.48805 8.5 7.24941 8.59974 7.11618C8.68666 7.00007 8.81971 6.92744 8.96438 6.9171C9.13038 6.90525 9.33112 7.03429 9.73261 7.29239L14.4532 10.3271C14.8016 10.551 14.9758 10.663 15.0359 10.8054C15.0885 10.9298 15.0885 11.0702 15.0359 11.1946C14.9758 11.337 14.8016 11.449 14.4532 11.6729L9.73261 14.7076C9.33112 14.9657 9.13038 15.0948 8.96438 15.0829C8.81971 15.0726 8.68666 14.9999 8.59974 14.8838C8.5 14.7506 8.5 14.512 8.5 14.0347V7.96533Z",
    stroke: "#F8478D",
    strokeWidth: "2",
    strokeLinecap: "round",
    strokeLinejoin: "round"
  })),
  arrowtwo: () => (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
    width: "8",
    height: "12",
    viewBox: "0 0 8 12",
    fill: "none",
    xmlns: "http://www.w3.org/2000/svg"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    d: "M1.5 11L6.5 6L1.5 1",
    stroke: "currentColor",
    strokeWidth: "1.67",
    strokeLinecap: "round",
    strokeLinejoin: "round"
  })),
  proLogo: () => (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
    width: "36",
    height: "32",
    viewBox: "0 0 36 32",
    fill: "none",
    xmlns: "http://www.w3.org/2000/svg",
    xlink: "http://www.w3.org/1999/xlink"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
    width: "36",
    height: "32",
    fill: "url(#pattern0_2414_1329)"
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("defs", null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("pattern", {
    id: "pattern0_2414_1329",
    patternContentUnits: "objectBoundingBox",
    width: "1",
    height: "1"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("use", {
    href: "#image0_2414_1329",
    transform: "matrix(0.0148148 0 0 0.0166667 -0.0037037 0)"
  })), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("image", {
    id: "image0_2414_1329",
    width: "68",
    height: "60",
    href: "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEQAAAA8CAMAAADovOwsAAAAV1BMVEXOc5rbY5HlV4roU4foU4foU4foU4foU4foU4foU4fbT4W0THucS3WMVHiETneKY4aDjaKGtb+Izc+IztCIztCIztCIztCIztB/ZYZ8Q26UR3TKT4DnU4fgu8wDAAAAF3RSTlMAECFFeJKvx97w/P399fz4/v7z6D6GwuxpqwkAAAFiSURBVFjDtZeBeoIwDISpIlBwDhCsxb7/c05pxiqMQtPzHuD/kksouST5V6Lr+9u1Vaqpv7+qhzGyyLP0KJLdEv1NvdTUd00aqtK8lKf7OJ0lqGYiWJ0fI8ZkRzZiLIcwuR8jPIixmpKq8TTVtcS46DVRMXK1mN4iVK09qizFnLytqLv2aiBKLviMJ6Vco+xneGoJYDgUhqcb7nZhjGnSxpm02N6PuchceeAZQrtLpWTzZhodoHlDjEIWE2IVMi+FVcjMFUEMpQNFECPC92y5cSm/mzdr2d24/TBn8z4ftiWuKWxL3CFHQP6cvRLkotnOFknLHs4EkYmKhxgMpI33RMYYO0zGQkYMWTbI2kM+QMhTAHmUMM8j5KGG/DIwPy/IbxTzQ4ecFpgjB3JuYQ4/zAmKOYY3U8ryLC/EZwICJqo4oamOCE074tvvnh4+HSRBkXbExIdrJ+Y/c76N+aU/5v8AY+8/zMsnEUwAAAAASUVORK5CYII="
  }))),
  preview: () => (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
    width: "20",
    height: "14",
    viewBox: "0 0 20 14",
    fill: "none",
    xmlns: "http://www.w3.org/2000/svg"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    d: "M2.01677 7.59415C1.90328 7.41445 1.84654 7.3246 1.81477 7.18602C1.79091 7.08192 1.79091 6.91775 1.81477 6.81366C1.84654 6.67507 1.90328 6.58522 2.01677 6.40552C2.95461 4.92054 5.74617 1.1665 10.0003 1.1665C14.2545 1.1665 17.0461 4.92054 17.9839 6.40552C18.0974 6.58522 18.1541 6.67507 18.1859 6.81366C18.2098 6.91775 18.2098 7.08192 18.1859 7.18602C18.1541 7.3246 18.0974 7.41445 17.9839 7.59415C17.0461 9.07914 14.2545 12.8332 10.0003 12.8332C5.74617 12.8332 2.95461 9.07914 2.01677 7.59415Z",
    stroke: "#F8478D",
    strokeWidth: "1.67",
    strokeLinecap: "round",
    strokeLinejoin: "round"
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    d: "M10.0003 9.49984C11.381 9.49984 12.5003 8.38055 12.5003 6.99984C12.5003 5.61913 11.381 4.49984 10.0003 4.49984C8.61962 4.49984 7.50034 5.61913 7.50034 6.99984C7.50034 8.38055 8.61962 9.49984 10.0003 9.49984Z",
    stroke: "#F8478D",
    strokeWidth: "1.67",
    strokeLinecap: "round",
    strokeLinejoin: "round"
  })),
  hidePassowrd: () => (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
    width: "20",
    height: "20",
    viewBox: "0 0 20 20",
    fill: "none",
    xmlns: "http://www.w3.org/2000/svg"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    d: "M8.95245 4.2436C9.29113 4.19353 9.64051 4.16667 10.0003 4.16667C14.2545 4.16667 17.0461 7.9207 17.9839 9.40569C18.0974 9.58542 18.1542 9.67528 18.1859 9.81389C18.2098 9.91799 18.2098 10.0822 18.1859 10.1863C18.1541 10.3249 18.097 10.4154 17.9827 10.5963C17.7328 10.9918 17.3518 11.5476 16.8471 12.1504M5.6036 5.59586C3.80187 6.81808 2.57871 8.51615 2.01759 9.4044C1.90357 9.58489 1.84656 9.67514 1.81478 9.81373C1.79091 9.91783 1.7909 10.082 1.81476 10.1861C1.84652 10.3247 1.90328 10.4146 2.01678 10.5943C2.95462 12.0793 5.74618 15.8333 10.0003 15.8333C11.7157 15.8333 13.1932 15.223 14.4074 14.3972M2.50035 2.5L17.5003 17.5M8.23258 8.23223C7.78017 8.68464 7.50035 9.30964 7.50035 10C7.50035 11.3807 8.61964 12.5 10.0003 12.5C10.6907 12.5 11.3157 12.2202 11.7681 11.7678",
    stroke: "#5A5F61",
    strokeWidth: "1.67",
    strokeLinecap: "round",
    strokeLinejoin: "round"
  })),
  minus: () => (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
    width: "24",
    height: "24",
    viewBox: "0 0 24 24",
    fill: "none",
    xmlns: "http://www.w3.org/2000/svg"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    d: "M8 12H16M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12Z",
    stroke: "#98A2B3",
    strokeWidth: "2",
    strokeLinecap: "round",
    strokeLinejoin: "round"
  })),
  plus: () => (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
    width: "24",
    height: "24",
    viewBox: "0 0 24 24",
    fill: "none",
    xmlns: "http://www.w3.org/2000/svg"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    d: "M12 8V16M8 12H16M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12Z",
    stroke: "#98A2B3",
    strokeWidth: "2",
    strokeLinecap: "round",
    strokeLinejoin: "round"
  })),
  pluginList: () => (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
    width: "48",
    height: "48",
    viewBox: "0 0 48 48",
    fill: "none",
    xmlns: "http://www.w3.org/2000/svg"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    d: "M10.6715 41.615C11.0288 41.2231 11.2158 40.7053 11.1914 40.1756C11.1671 39.6458 10.9333 39.1474 10.5415 38.79C7.15342 35.7059 4.92693 31.5521 4.23437 27.0232C3.54182 22.4943 4.42519 17.8649 6.73675 13.9092C9.04831 9.95354 12.6479 6.91143 16.9336 5.29163C21.2192 3.67182 25.9311 3.57254 30.2812 5.01037C34.6313 6.44821 38.3558 9.33599 40.832 13.1908C43.3081 17.0456 44.3857 21.6336 43.8845 26.1877C43.3834 30.7417 41.3338 34.9857 38.0787 38.2097C34.8235 41.4338 30.5601 43.4426 26.0015 43.9V35.96C28.5768 35.8569 31.0129 34.7635 32.8015 32.9078C34.5902 31.052 35.5932 28.5774 35.6015 26V22C35.6015 21.4696 35.3908 20.9609 35.0157 20.5858C34.6406 20.2107 34.1319 20 33.6015 20H30.0015V14C30.0015 13.4696 29.7908 12.9609 29.4157 12.5858C29.0406 12.2107 28.5319 12 28.0015 12C27.4711 12 26.9623 12.2107 26.5873 12.5858C26.2122 12.9609 26.0015 13.4696 26.0015 14V20H22.0015V14C22.0015 13.4696 21.7908 12.9609 21.4157 12.5858C21.0406 12.2107 20.5319 12 20.0015 12C19.4711 12 18.9623 12.2107 18.5873 12.5858C18.2122 12.9609 18.0015 13.4696 18.0015 14V20H14.4015C13.8711 20 13.3623 20.2107 12.9873 20.5858C12.6122 20.9609 12.4015 21.4696 12.4015 22V26C12.4097 28.5774 13.4128 31.052 15.2014 32.9078C16.9901 34.7635 19.4262 35.8569 22.0015 35.96V46C22.0015 46.5304 22.2122 47.0391 22.5873 47.4142C22.9623 47.7893 23.4711 48 24.0015 48C29.6024 47.9997 35.0269 46.0404 39.3353 42.4616C43.6437 38.8827 46.5648 33.9097 47.5925 28.4039C48.6203 22.8981 47.69 17.2061 44.9628 12.314C42.2356 7.42186 37.8833 3.63762 32.6596 1.61671C27.436 -0.404199 21.67 -0.534496 16.3604 1.24839C11.0508 3.03127 6.53197 6.61504 3.58657 11.379C0.641169 16.1429 -0.545284 21.787 0.232704 27.3337C1.01069 32.8803 3.70412 37.9802 7.84649 41.75C8.23903 42.1067 8.75717 42.2928 9.28694 42.2675C9.81672 42.2422 10.3148 42.0075 10.6715 41.615ZM16.4015 26V24H31.6015V26C31.6015 27.5913 30.9693 29.1174 29.8441 30.2426C28.7189 31.3679 27.1928 32 25.6015 32H22.4015C20.8102 32 19.2841 31.3679 18.1588 30.2426C17.0336 29.1174 16.4015 27.5913 16.4015 26Z",
    fill: "#F8478D"
  })),
  sidebar: () => (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
    width: "33",
    height: "32",
    viewBox: "0 0 33 32",
    fill: "none",
    xmlns: "http://www.w3.org/2000/svg"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("rect", {
    x: "0.666672",
    width: "32",
    height: "32",
    rx: "8",
    fill: "url(#paint0_linear_2820_689)"
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    d: "M19.1667 8.5V23.5M13.1667 8.5H20.1667C21.5668 8.5 22.2669 8.5 22.8016 8.77248C23.2721 9.01217 23.6545 9.39462 23.8942 9.86502C24.1667 10.3998 24.1667 11.0999 24.1667 12.5V19.5C24.1667 20.9001 24.1667 21.6002 23.8942 22.135C23.6545 22.6054 23.2721 22.9878 22.8016 23.2275C22.2669 23.5 21.5668 23.5 20.1667 23.5H13.1667C11.7665 23.5 11.0665 23.5 10.5317 23.2275C10.0613 22.9878 9.67884 22.6054 9.43916 22.135C9.16667 21.6002 9.16667 20.9001 9.16667 19.5V12.5C9.16667 11.0999 9.16667 10.3998 9.43916 9.86502C9.67884 9.39462 10.0613 9.01217 10.5317 8.77248C11.0665 8.5 11.7665 8.5 13.1667 8.5Z",
    stroke: "white",
    strokeWidth: "1.67",
    strokeLinecap: "round",
    strokeLinejoin: "round"
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("defs", null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("linearGradient", {
    id: "paint0_linear_2820_689",
    x1: "3.00163",
    y1: "3.5",
    x2: "30.5016",
    y2: "30",
    gradientUnits: "userSpaceOnUse"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("stop", {
    stopColor: "#5081F5"
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("stop", {
    offset: "1",
    stopColor: "#A769F5"
  })))),
  star: () => (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
    width: "116",
    height: "20",
    viewBox: "0 0 116 20",
    fill: "none",
    xmlns: "http://www.w3.org/2000/svg"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    d: "M9.14319 1.42372C9.53185 0.777902 10.4681 0.777901 10.8568 1.42372L13.0731 5.10651C13.2128 5.33853 13.4405 5.504 13.7043 5.56509L17.8918 6.53491C18.6261 6.70498 18.9154 7.59545 18.4213 8.16466L15.6036 11.4106C15.4261 11.6151 15.3391 11.8828 15.3625 12.1526L15.7342 16.4347C15.7994 17.1857 15.0419 17.736 14.3478 17.442L10.3901 15.7653C10.1408 15.6596 9.85924 15.6596 9.60991 15.7653L5.65216 17.442C4.95813 17.736 4.20065 17.1857 4.26582 16.4347L4.63745 12.1526C4.66087 11.8828 4.57387 11.6151 4.39637 11.4106L1.57871 8.16466C1.0846 7.59545 1.37393 6.70498 2.10824 6.53491L6.29567 5.56509C6.55948 5.504 6.78723 5.33853 6.92685 5.10652L9.14319 1.42372Z",
    fill: "#F9B83A"
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    d: "M33.1432 1.42372C33.5319 0.777902 34.4681 0.777901 34.8568 1.42372L37.0731 5.10651C37.2128 5.33853 37.4405 5.504 37.7043 5.56509L41.8918 6.53491C42.6261 6.70498 42.9154 7.59545 42.4213 8.16466L39.6036 11.4106C39.4261 11.6151 39.3391 11.8828 39.3625 12.1526L39.7342 16.4347C39.7994 17.1857 39.0419 17.736 38.3478 17.442L34.3901 15.7653C34.1408 15.6596 33.8592 15.6596 33.6099 15.7653L29.6522 17.442C28.9581 17.736 28.2006 17.1857 28.2658 16.4347L28.6375 12.1526C28.6609 11.8828 28.5739 11.6151 28.3964 11.4106L25.5787 8.16466C25.0846 7.59545 25.3739 6.70498 26.1082 6.53491L30.2957 5.56509C30.5595 5.504 30.7872 5.33853 30.9269 5.10652L33.1432 1.42372Z",
    fill: "#F9B83A"
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    d: "M57.1432 1.42372C57.5319 0.777902 58.4681 0.777901 58.8568 1.42372L61.0731 5.10651C61.2128 5.33853 61.4405 5.504 61.7043 5.56509L65.8918 6.53491C66.6261 6.70498 66.9154 7.59545 66.4213 8.16466L63.6036 11.4106C63.4261 11.6151 63.3391 11.8828 63.3625 12.1526L63.7342 16.4347C63.7994 17.1857 63.0419 17.736 62.3478 17.442L58.3901 15.7653C58.1408 15.6596 57.8592 15.6596 57.6099 15.7653L53.6522 17.442C52.9581 17.736 52.2006 17.1857 52.2658 16.4347L52.6375 12.1526C52.6609 11.8828 52.5739 11.6151 52.3964 11.4106L49.5787 8.16466C49.0846 7.59545 49.3739 6.70498 50.1082 6.53491L54.2957 5.56509C54.5595 5.504 54.7872 5.33853 54.9269 5.10652L57.1432 1.42372Z",
    fill: "#F9B83A"
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    d: "M81.1432 1.42372C81.5319 0.777902 82.4681 0.777901 82.8568 1.42372L85.0731 5.10651C85.2128 5.33853 85.4405 5.504 85.7043 5.56509L89.8918 6.53491C90.6261 6.70498 90.9154 7.59545 90.4213 8.16466L87.6036 11.4106C87.4261 11.6151 87.3391 11.8828 87.3625 12.1526L87.7342 16.4347C87.7994 17.1857 87.0419 17.736 86.3478 17.442L82.3901 15.7653C82.1408 15.6596 81.8592 15.6596 81.6099 15.7653L77.6522 17.442C76.9581 17.736 76.2006 17.1857 76.2658 16.4347L76.6375 12.1526C76.6609 11.8828 76.5739 11.6151 76.3964 11.4106L73.5787 8.16466C73.0846 7.59545 73.3739 6.70498 74.1082 6.53491L78.2957 5.56509C78.5595 5.504 78.7872 5.33853 78.9269 5.10652L81.1432 1.42372Z",
    fill: "#F9B83A"
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    d: "M105.143 1.42372C105.532 0.777902 106.468 0.777901 106.857 1.42372L109.073 5.10651C109.213 5.33853 109.441 5.504 109.704 5.56509L113.892 6.53491C114.626 6.70498 114.915 7.59545 114.421 8.16466L111.604 11.4106C111.426 11.6151 111.339 11.8828 111.363 12.1526L111.734 16.4347C111.799 17.1857 111.042 17.736 110.348 17.442L106.39 15.7653C106.141 15.6596 105.859 15.6596 105.61 15.7653L101.652 17.442C100.958 17.736 100.201 17.1857 100.266 16.4347L100.637 12.1526C100.661 11.8828 100.574 11.6151 100.396 11.4106L97.5787 8.16466C97.0846 7.59545 97.3739 6.70498 98.1082 6.53491L102.296 5.56509C102.559 5.504 102.787 5.33853 102.927 5.10652L105.143 1.42372Z",
    fill: "#F9B83A"
  })),
  review: () => (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
    width: "20",
    height: "20",
    viewBox: "0 0 20 20",
    fill: "none",
    xmlns: "http://www.w3.org/2000/svg"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    d: "M7.56246 11.8748L9.99996 10.3957L12.4375 11.8748L11.7916 9.104L13.9583 7.229L11.1041 6.99984L9.99996 4.37484L8.89579 6.99984L6.04163 7.229L8.20829 9.104L7.56246 11.8748ZM1.66663 18.3332V3.33317C1.66663 2.87484 1.82996 2.48262 2.15663 2.1565C2.48329 1.83039 2.87551 1.66706 3.33329 1.6665H16.6666C17.125 1.6665 17.5175 1.82984 17.8441 2.1565C18.1708 2.48317 18.3338 2.87539 18.3333 3.33317V13.3332C18.3333 13.7915 18.1702 14.184 17.8441 14.5107C17.518 14.8373 17.1255 15.0004 16.6666 14.9998H4.99996L1.66663 18.3332ZM4.29163 13.3332H16.6666V3.33317H3.33329V14.2707L4.29163 13.3332Z",
    fill: "currentColor"
  }))
};
const Icon = ({
  icon,
  tooltip,
  label
}) => {
  const Icon = icons[icon];
  return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(react__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, Icon && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(Icon, null), label && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("h3", {
    className: "cwLabel"
  }, label), tooltip && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
    className: "cw-tooltip"
  }, tooltip));
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (Icon);

/***/ }),

/***/ "./src/components/Offer/index.jsx":
/*!****************************************!*\
  !*** ./src/components/Offer/index.jsx ***!
  \****************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ Offer)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _components_images__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../components/images */ "./src/components/images.js");
/* harmony import */ var ___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! .. */ "./src/components/index.js");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__);




function Offer() {
  const offerList = [{
    heading: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)("Get All 20 Premium Themes Worth $1180 for Just $149!", 'cookery'),
    para: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)("Join the Blossom Themes Theme Club to access a diverse collection of beautifully designed, feature-rich WordPress themes. Perfect for bloggers, businesses, and creatives, our themes offer seamless customization, responsive design, and excellent support to help you create a stunning online presence effortlessly.", 'cookery'),
    imageurl: _components_images__WEBPACK_IMPORTED_MODULE_1__.themeClub,
    buttonText: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)("View All Themes", 'cookery'),
    buttonUrl: 'https://blossomthemes.com/theme/premium-wordpress-themes/?utm_source=cookery&utm_medium=dashboard&utm_campaign=premium_themes',
    buttonTwo: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)("Buy Now", 'cookery'),
    buttonTwoUrl: cw_dashboard.theme_club_upgrade
  }, {
    heading: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)("Sales Funnel and Landing Page Templates for WordPress", 'cookery'),
    para: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)("Transform your website into a lead and sales generating machine with our ready-made sales funnel and landing page templates. Perfect for kickstarting your online success!", 'cookery'),
    imageurl: _components_images__WEBPACK_IMPORTED_MODULE_1__.salesFunnel,
    buttonUrl: cw_dashboard.sales_funnel,
    buttonText: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)("Buy Now", 'cookery')
  }, {
    heading: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)("Enhance Your Website's Aesthetics with WP Custom Fonts!", 'cookery'),
    para: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)("Elevate your typography and stand out from the crowd. Upgrade now to unlock endless font possibilities for your WordPress site!", 'cookery'),
    imageurl: _components_images__WEBPACK_IMPORTED_MODULE_1__.customFonts,
    buttonUrl: cw_dashboard.custom_fonts,
    buttonText: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)("Learn More", 'cookery')
  }, {
    heading: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)("VIP Care - Expert Website Care for WordPress", 'cookery'),
    para: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)("Our VIP Care service offers comprehensive maintenance, protection, and speed optimization for your WordPress site, ensuring you never have to worry about it again. Relax and let us handle everything!", 'cookery'),
    imageurl: _components_images__WEBPACK_IMPORTED_MODULE_1__.vipSiteCare,
    buttonUrl: cw_dashboard.vip_site_care,
    buttonText: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)("Get Started", 'cookery')
  }];
  const offerListing = offerList.map((item, index) => {
    return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      className: "cw-offers",
      key: index
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      className: "cw-offerbody"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("h3", {
      className: "cw-heading"
    }, item.heading), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("p", {
      className: "cw-text"
    }, item.para), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      className: "cw-button"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("a", {
      href: item.buttonUrl,
      target: "_blank",
      className: "cw-button-btn primary-btn"
    }, item.buttonText, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(___WEBPACK_IMPORTED_MODULE_2__.Icon, {
      icon: "arrowtwo"
    })), item.buttonTwo && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("a", {
      href: item.buttonTwoUrl,
      target: "_blank",
      className: "cw-button-btn outline"
    }, item.buttonTwo, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(___WEBPACK_IMPORTED_MODULE_2__.Icon, {
      icon: "arrowtwo"
    })))), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      className: "cw-offer-image"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("img", {
      src: item.imageurl,
      alt: "blossom"
    })));
  });
  return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "cw-offer-wrap"
  }, offerListing);
}

/***/ }),

/***/ "./src/components/Sidebar/index.jsx":
/*!******************************************!*\
  !*** ./src/components/Sidebar/index.jsx ***!
  \******************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _Icon__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../Icon */ "./src/components/Icon/index.jsx");



const Sidebar = ({
  sidebarSettings,
  openInNewTab
}) => {
  const sidebarListing = sidebar => {
    return sidebar.map((sidebaritem, index) => {
      return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
        className: "cw-sidebarbody",
        key: index
      }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("h3", null, sidebaritem.heading), sidebaritem.icon && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_Icon__WEBPACK_IMPORTED_MODULE_1__["default"], {
        icon: sidebaritem.icon
      })), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("p", null, sidebaritem.para), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
        className: "cw-button"
      }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("a", {
        href: sidebaritem.buttonUrl,
        target: openInNewTab ? "_blank" : "_self",
        className: "cw-button-btn outline"
      }, sidebaritem.imageurl, sidebaritem.buttonText, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_Icon__WEBPACK_IMPORTED_MODULE_1__["default"], {
        icon: "arrowtwo"
      }))));
    });
  };
  return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(react__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "cw-sidebar"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "cw-sidebar-list"
  }, sidebarListing(sidebarSettings))));
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (Sidebar);

/***/ }),

/***/ "./src/components/TabHeader/index.jsx":
/*!********************************************!*\
  !*** ./src/components/TabHeader/index.jsx ***!
  \********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var ___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! .. */ "./src/components/index.js");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__);



const TabHeader = ({
  title
}) => {
  const docLinks = [{
    name: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('View Website', 'cookery'),
    link: cw_dashboard.website,
    icon: "globe"
  }, {
    name: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('View Tutorials ', 'cookery'),
    link: cw_dashboard.videotutorial,
    icon: "youtube"
  }, {
    name: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Contact Support', 'cookery'),
    link: cw_dashboard.support,
    icon: "support"
  }, {
    name: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Docs', 'cookery'),
    link: cw_dashboard.docmentation,
    icon: "doc"
  }];
  const docLinkListing = () => {
    return docLinks.map((list, index) => (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("a", {
      key: index,
      href: list.link,
      target: "_blank"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(___WEBPACK_IMPORTED_MODULE_1__.Icon, {
      icon: list.icon,
      tooltip: list.name
    })));
  };
  return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(react__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("header", {
    className: "navbar"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("h1", null, title), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "info"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
    className: "version"
  }, cw_dashboard.theme_version), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "doc-links"
  }, docLinkListing()))));
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (TabHeader);

/***/ }),

/***/ "./src/components/Tab/index.jsx":
/*!**************************************!*\
  !*** ./src/components/Tab/index.jsx ***!
  \**************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _useTabs__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./useTabs */ "./src/components/Tab/useTabs.jsx");
/* harmony import */ var ___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! .. */ "./src/components/index.js");
/* harmony import */ var _components_images__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../components/images */ "./src/components/images.js");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__);





const Tab = ({
  tabsData,
  onChange,
  activeTabTitle
}) => {
  const {
    renderTabs,
    renderContent
  } = (0,_useTabs__WEBPACK_IMPORTED_MODULE_1__["default"])(tabsData, 0, onChange);
  return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "cw-tabs-container"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "cw-tabs"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "wrapper"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "top"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "logo"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("img", {
    src: _components_images__WEBPACK_IMPORTED_MODULE_3__.logo,
    alt: "logo"
  })), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "cw-tabs-button"
  }, renderTabs())))), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "wrapper"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(___WEBPACK_IMPORTED_MODULE_2__.TabHeader, {
    title: activeTabTitle
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "cw-tabs-content"
  }, renderContent())));
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (Tab);

/***/ }),

/***/ "./src/components/Tab/useTabs.jsx":
/*!****************************************!*\
  !*** ./src/components/Tab/useTabs.jsx ***!
  \****************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);


function useTabs(initialTabs, initialActiveTab = 0, onChange) {
  const tabsRef = (0,react__WEBPACK_IMPORTED_MODULE_0__.useRef)(initialTabs);
  const [activeTab, setActiveTab] = (0,react__WEBPACK_IMPORTED_MODULE_0__.useState)(initialActiveTab);
  const handleTabClick = (0,react__WEBPACK_IMPORTED_MODULE_0__.useCallback)(index => {
    if (index !== activeTab) {
      setActiveTab(index);
      const newHash = tabsRef.current[index].title.toLowerCase().replace(/ /g, "-");
      if (onChange) {
        onChange(tabsRef.current[index].title);
      }
      if (typeof window !== 'undefined') {
        window.location.hash = newHash;
      }
    }
  }, [activeTab, onChange]);
  const checkHash = (0,react__WEBPACK_IMPORTED_MODULE_0__.useCallback)(() => {
    if (typeof window !== 'undefined') {
      const hash = window.location.hash.substring(1);
      const tabIndex = tabsRef.current.findIndex(tab => tab.title.toLowerCase().replace(/ /g, "-") === hash);
      if (tabIndex !== -1 && tabIndex !== activeTab) {
        setActiveTab(tabIndex);
        if (onChange) {
          onChange(tabsRef.current[tabIndex].title);
        }
      }
    }
  }, [activeTab, onChange]);
  (0,react__WEBPACK_IMPORTED_MODULE_0__.useEffect)(() => {
    if (typeof window !== 'undefined') {
      checkHash();
      window.addEventListener('hashchange', checkHash);
      return () => {
        window.removeEventListener('hashchange', checkHash);
      };
    }
  }, [checkHash]);
  const renderTabs = (0,react__WEBPACK_IMPORTED_MODULE_0__.useMemo)(() => () => {
    return tabsRef.current.map((tab, index) => (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("button", {
      key: index,
      onClick: () => handleTabClick(index),
      className: activeTab === index ? 'active-tab' : ''
    }, tab.icon, tab.title));
  }, [handleTabClick, activeTab]);
  const renderContent = (0,react__WEBPACK_IMPORTED_MODULE_0__.useMemo)(() => () => {
    return tabsRef.current[activeTab].content;
  }, [activeTab]);
  return {
    renderTabs,
    renderContent
  };
}
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (useTabs);

/***/ }),

/***/ "./src/components/images.js":
/*!**********************************!*\
  !*** ./src/components/images.js ***!
  \**********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   GDPR: () => (/* reexport default export from named module */ _assets_img_GDPR_png__WEBPACK_IMPORTED_MODULE_7__),
/* harmony export */   SEO: () => (/* reexport default export from named module */ _assets_img_SEO_png__WEBPACK_IMPORTED_MODULE_6__),
/* harmony export */   customFonts: () => (/* reexport default export from named module */ _assets_img_customfonts_png__WEBPACK_IMPORTED_MODULE_0__),
/* harmony export */   demo2: () => (/* reexport default export from named module */ _assets_img_demo_2_webp__WEBPACK_IMPORTED_MODULE_13__),
/* harmony export */   demo3: () => (/* reexport default export from named module */ _assets_img_demo_3_webp__WEBPACK_IMPORTED_MODULE_14__),
/* harmony export */   freePro: () => (/* reexport default export from named module */ _assets_img_freevspro_webp__WEBPACK_IMPORTED_MODULE_1__),
/* harmony export */   logo: () => (/* reexport default export from named module */ _assets_img_logo_png__WEBPACK_IMPORTED_MODULE_2__),
/* harmony export */   mainDemo: () => (/* reexport default export from named module */ _assets_img_main_demo_webp__WEBPACK_IMPORTED_MODULE_12__),
/* harmony export */   offerOne: () => (/* reexport default export from named module */ _assets_img_offer_one_png__WEBPACK_IMPORTED_MODULE_3__),
/* harmony export */   plugins: () => (/* reexport default export from named module */ _assets_img_plugins_png__WEBPACK_IMPORTED_MODULE_4__),
/* harmony export */   salesFunnel: () => (/* reexport default export from named module */ _assets_img_salesfunnel_png__WEBPACK_IMPORTED_MODULE_5__),
/* harmony export */   support: () => (/* reexport default export from named module */ _assets_img_support_png__WEBPACK_IMPORTED_MODULE_8__),
/* harmony export */   themeClub: () => (/* reexport default export from named module */ _assets_img_themeClub_png__WEBPACK_IMPORTED_MODULE_9__),
/* harmony export */   themeInstall: () => (/* reexport default export from named module */ _assets_img_themeinstall_png__WEBPACK_IMPORTED_MODULE_10__),
/* harmony export */   vipSiteCare: () => (/* reexport default export from named module */ _assets_img_vipsitecare_png__WEBPACK_IMPORTED_MODULE_11__)
/* harmony export */ });
/* harmony import */ var _assets_img_customfonts_png__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../assets/img/customfonts.png */ "./src/assets/img/customfonts.png");
/* harmony import */ var _assets_img_freevspro_webp__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../assets/img/freevspro.webp */ "./src/assets/img/freevspro.webp");
/* harmony import */ var _assets_img_logo_png__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../assets/img/logo.png */ "./src/assets/img/logo.png");
/* harmony import */ var _assets_img_offer_one_png__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../assets/img/offer-one.png */ "./src/assets/img/offer-one.png");
/* harmony import */ var _assets_img_plugins_png__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../assets/img/plugins.png */ "./src/assets/img/plugins.png");
/* harmony import */ var _assets_img_salesfunnel_png__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ../assets/img/salesfunnel.png */ "./src/assets/img/salesfunnel.png");
/* harmony import */ var _assets_img_SEO_png__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ../assets/img/SEO.png */ "./src/assets/img/SEO.png");
/* harmony import */ var _assets_img_GDPR_png__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ../assets/img/GDPR.png */ "./src/assets/img/GDPR.png");
/* harmony import */ var _assets_img_support_png__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ../assets/img/support.png */ "./src/assets/img/support.png");
/* harmony import */ var _assets_img_themeClub_png__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! ../assets/img/themeClub.png */ "./src/assets/img/themeClub.png");
/* harmony import */ var _assets_img_themeinstall_png__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! ../assets/img/themeinstall.png */ "./src/assets/img/themeinstall.png");
/* harmony import */ var _assets_img_vipsitecare_png__WEBPACK_IMPORTED_MODULE_11__ = __webpack_require__(/*! ../assets/img/vipsitecare.png */ "./src/assets/img/vipsitecare.png");
/* harmony import */ var _assets_img_main_demo_webp__WEBPACK_IMPORTED_MODULE_12__ = __webpack_require__(/*! ../assets/img/main-demo.webp */ "./src/assets/img/main-demo.webp");
/* harmony import */ var _assets_img_demo_2_webp__WEBPACK_IMPORTED_MODULE_13__ = __webpack_require__(/*! ../assets/img/demo-2.webp */ "./src/assets/img/demo-2.webp");
/* harmony import */ var _assets_img_demo_3_webp__WEBPACK_IMPORTED_MODULE_14__ = __webpack_require__(/*! ../assets/img/demo-3.webp */ "./src/assets/img/demo-3.webp");
















/***/ }),

/***/ "./src/components/index.js":
/*!*********************************!*\
  !*** ./src/components/index.js ***!
  \*********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   Card: () => (/* reexport safe */ _Card__WEBPACK_IMPORTED_MODULE_4__["default"]),
/* harmony export */   Heading: () => (/* reexport safe */ _Heading__WEBPACK_IMPORTED_MODULE_5__["default"]),
/* harmony export */   Icon: () => (/* reexport safe */ _Icon__WEBPACK_IMPORTED_MODULE_0__["default"]),
/* harmony export */   Offer: () => (/* reexport safe */ _Offer__WEBPACK_IMPORTED_MODULE_6__["default"]),
/* harmony export */   Sidebar: () => (/* reexport safe */ _Sidebar__WEBPACK_IMPORTED_MODULE_2__["default"]),
/* harmony export */   Tab: () => (/* reexport safe */ _Tab__WEBPACK_IMPORTED_MODULE_1__["default"]),
/* harmony export */   TabHeader: () => (/* reexport safe */ _TabHeader__WEBPACK_IMPORTED_MODULE_3__["default"])
/* harmony export */ });
/* harmony import */ var _Icon__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Icon */ "./src/components/Icon/index.jsx");
/* harmony import */ var _Tab__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Tab */ "./src/components/Tab/index.jsx");
/* harmony import */ var _Sidebar__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./Sidebar */ "./src/components/Sidebar/index.jsx");
/* harmony import */ var _TabHeader__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./TabHeader */ "./src/components/TabHeader/index.jsx");
/* harmony import */ var _Card__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./Card */ "./src/components/Card/index.jsx");
/* harmony import */ var _Heading__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./Heading */ "./src/components/Heading/index.jsx");
/* harmony import */ var _Offer__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./Offer */ "./src/components/Offer/index.jsx");








/***/ }),

/***/ "./src/pages/FAQ/index.jsx":
/*!*********************************!*\
  !*** ./src/pages/FAQ/index.jsx ***!
  \*********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _components__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../components */ "./src/components/index.js");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__);




function FAQ() {
  const faqContent = [{
    title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('How to activate the theme license?', 'cookery'),
    description: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("p", null, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('To activate the theme license, you need to copy the license key from your', 'cookery'), " ", (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("a", {
      href: cw_dashboard.account,
      target: "_blank"
    }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)(`Blossom Themes' Dashboard`, 'cookery')), " ", (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)(`and enter the key on the right-hand side of this page. You can log in to your Blossom Themes' dashboard using the username and password that was sent to your email during the theme purchase.`, 'cookery'))
  }, {
    title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('What are the benefits of activating the theme license?', 'cookery'),
    description: 'When you activate the theme license, you can enjoy the seamless theme updates and faster support. We solve compatibility issues and bugs, make the theme more secure, and sometimes add extra features with theme updates. So, if you want your website to be safe and secure, you should activate the theme license so that you never miss our theme updates.'
  }, {
    title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('How to renew the theme license?', 'cookery'),
    description: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("p", null, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('The theme license will be automatically renewed. You will receive multiple reminders in your email before your theme expires. If you want to cancel the auto-renewal, ', 'cookery'), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("a", {
      href: cw_dashboard.support,
      target: "_blank"
    }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('please contact us.', 'cookery')))
  }, {
    title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('What are the benefits of upgrading to the Theme Club?', 'cookery'),
    description: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("p", null, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('For just small additional amount of money, you will get access to all our current themes, new theme releases, theme updates, and email support with the', 'cookery'), " ", (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("a", {
      href: cw_dashboard.theme_club_upgrade,
      target: "_blank"
    }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Theme Club.', 'cookery')))
  }, {
    title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('How can I upgrade to the Theme Club?', 'cookery'),
    description: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("p", null, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('To upgrade to the Theme Club, please log in to your ', 'cookery'), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("a", {
      href: cw_dashboard.account,
      target: "_blank"
    }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)(`Blossom Themes' Dashboard`, 'cookery')), " ", (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('using the username and password created during the purchase. After you log in, click on ', 'cookery'), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("b", null, " ", (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('View Licenses', 'cookery'), " ", '>', " ", (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('View Upgrades', 'cookery')), " ", (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('and select the', 'cookery'), " ", (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("b", null, " ", (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Theme Club Upgrade', 'cookery')), " ", (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('you want.', 'cookery'))
  }, {
    title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Why is my theme not working well?', 'cookery'),
    description: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(react__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("p", null, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('If your customizer is not loading properly or you are having issues with the theme, it might be due to the plugin conflict.', 'cookery')), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("p", null, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('To solve the issue, deactivate all the plugins first, except the ones recommended by the theme. Then, hard reload your website using ', 'cookery'), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("b", null, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)(`"Ctrl+Shift+R"`, 'cookery')), " ", (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('on Windows. If the issues are fixed, start activating the plugins one by one, and reload and check your site each time. This will help you find out the plugin that is causing the problem.', 'cookery')), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("p", null, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)(`If this didn't help, please`, 'cookery'), " ", (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("a", {
      href: cw_dashboard.support,
      target: "_blank"
    }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('contact us.', 'cookery'))))
  }, {
    title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('How can I solve my issues quickly and get faster support?', 'cookery'),
    description: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(react__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("p", null, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Before you send us a support ticket for any issues, please make sure you have updated the theme to the latest version. We might have fixed the bug in the theme update.', 'cookery')), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("p", null, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)(`When you submit the support ticket, please try to provide as much details as possible so that we can solve your problem faster. We recommend you to send us a screenshot(s) with issues explained and your website's address (URL).You can contact us `, 'cookery'), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("a", {
      href: cw_dashboard.support,
      target: "_blank"
    }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('here.', 'cookery'))), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("p", null, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Also, you might experience a slower response time during the weekend, so please bear with us.', 'cookery')))
  }];
  const [openIndex, setOpenIndex] = (0,react__WEBPACK_IMPORTED_MODULE_0__.useState)(0);
  const [height, setHeight] = (0,react__WEBPACK_IMPORTED_MODULE_0__.useState)('0px');
  const contentRef = (0,react__WEBPACK_IMPORTED_MODULE_0__.useRef)(null);
  (0,react__WEBPACK_IMPORTED_MODULE_0__.useEffect)(() => {
    setHeight(openIndex !== -1 ? `${contentRef.current.scrollHeight}px` : '0px');
  }, [openIndex]);
  const toggleDescription = index => {
    setOpenIndex(index === openIndex ? -1 : index);
  };
  return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(react__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, faqContent.map((content, index) => (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "faq-item",
    key: index
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "faq-title",
    onClick: () => toggleDescription(index)
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("h2", null, content.title), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_components__WEBPACK_IMPORTED_MODULE_1__.Icon, {
    icon: openIndex === index ? 'minus' : 'plus'
  }))), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "faq-description",
    ref: openIndex === index ? contentRef : null,
    style: {
      maxHeight: openIndex === index ? height : '0px',
      overflow: 'hidden',
      transition: 'max-height 0.5s ease'
    }
  }, typeof content.description === 'string' ? (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("p", null, content.description) : content.description))));
}
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (FAQ);

/***/ }),

/***/ "./src/pages/Home/index.jsx":
/*!**********************************!*\
  !*** ./src/pages/Home/index.jsx ***!
  \**********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _components__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../components */ "./src/components/index.js");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__);



const Homepage = () => {
  const cardLists = [{
    iconSvg: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_components__WEBPACK_IMPORTED_MODULE_1__.Icon, {
      icon: "site"
    }),
    heading: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Site Identity', 'cookery'),
    buttonText: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Customize', 'cookery'),
    buttonUrl: cw_dashboard.custom_logo
  }, {
    iconSvg: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_components__WEBPACK_IMPORTED_MODULE_1__.Icon, {
      icon: "colorsetting"
    }),
    heading: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)("Color Settings", 'cookery'),
    buttonText: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Customize', 'cookery'),
    buttonUrl: cw_dashboard.colors
  }, {
    iconSvg: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_components__WEBPACK_IMPORTED_MODULE_1__.Icon, {
      icon: "typographysetting"
    }),
    heading: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)("Typography Settings", 'cookery'),
    buttonText: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Customize', 'cookery'),
    buttonUrl: cw_dashboard.typography
  }, {
    iconSvg: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_components__WEBPACK_IMPORTED_MODULE_1__.Icon, {
      icon: "layoutsetting"
    }),
    heading: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)("Layout Settings", 'cookery'),
    buttonText: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Customize', 'cookery'),
    buttonUrl: cw_dashboard.layout
  }, {
    iconSvg: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_components__WEBPACK_IMPORTED_MODULE_1__.Icon, {
      icon: "frontpagesetting"
    }),
    heading: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)("Performance Settings", 'cookery'),
    buttonText: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Customize', 'cookery'),
    buttonUrl: cw_dashboard.performance
  }, {
    iconSvg: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_components__WEBPACK_IMPORTED_MODULE_1__.Icon, {
      icon: "frontpagesetting"
    }),
    heading: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)("Frontpage Settings", 'cookery'),
    buttonText: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Customize', 'cookery'),
    buttonUrl: cw_dashboard.front
  }, {
    iconSvg: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_components__WEBPACK_IMPORTED_MODULE_1__.Icon, {
      icon: "generalsetting"
    }),
    heading: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)("General Settings", 'cookery'),
    buttonText: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Customize', 'cookery'),
    buttonUrl: cw_dashboard.general
  }, {
    iconSvg: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_components__WEBPACK_IMPORTED_MODULE_1__.Icon, {
      icon: "sidebar"
    }),
    heading: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)("Sidebar", 'cookery'),
    buttonText: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Customize', 'cookery'),
    buttonUrl: cw_dashboard.sidebar
  }, {
    iconSvg: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_components__WEBPACK_IMPORTED_MODULE_1__.Icon, {
      icon: "footersetting"
    }),
    heading: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Footer Settings', 'cookery'),
    buttonText: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Customize', 'cookery'),
    buttonUrl: cw_dashboard.footer
  }];
  const sidebarSettings = [{
    heading: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('We Value Your Feedback!', 'cookery'),
    icon: "star",
    para: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)("Your review helps us improve and assists others in making informed choices. Share your thoughts today!", 'cookery'),
    imageurl: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_components__WEBPACK_IMPORTED_MODULE_1__.Icon, {
      icon: "review"
    }),
    buttonText: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Leave a Review', 'cookery'),
    buttonUrl: cw_dashboard.review
  }, {
    heading: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Knowledge Base', 'cookery'),
    para: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)("Need help using our theme? Visit our well-organized Knowledge Base!", 'cookery'),
    imageurl: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_components__WEBPACK_IMPORTED_MODULE_1__.Icon, {
      icon: "documentation"
    }),
    buttonText: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Explore', 'cookery'),
    buttonUrl: cw_dashboard.docmentation
  }, {
    heading: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Need Assistance? ', 'cookery'),
    para: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)("If you need help or have any questions, don't hesitate to contact our support team. We're here to assist you!", 'cookery'),
    imageurl: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_components__WEBPACK_IMPORTED_MODULE_1__.Icon, {
      icon: "supportTwo"
    }),
    buttonText: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Submit a Ticket', 'cookery'),
    buttonUrl: cw_dashboard.support
  }];
  return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(react__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "customizer-settings"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "cw-customizer"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "video-section"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "cw-settings"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("h2", null, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Cookery Tutorial', 'cookery'))), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("iframe", {
    src: "https://www.youtube.com/embed/Xv_hJTux5kQ?si=6uaX20a6rlXXmLiL",
    title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('How to Start A Food Blog Step by Step In 2023 | Cookery Tutorial', 'blossom-travek'),
    frameBorder: "0",
    allow: "accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share",
    referrerPolicy: "strict-origin-when-cross-origin",
    allowFullScreen: true
  })), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_components__WEBPACK_IMPORTED_MODULE_1__.Heading, {
    heading: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Quick Customizer Settings', 'cookery'),
    buttonText: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Go To Customizer', 'cookery'),
    buttonUrl: cw_dashboard?.customizer_url,
    openInNewTab: true
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_components__WEBPACK_IMPORTED_MODULE_1__.Card, {
    cardList: cardLists,
    cardPlace: "customizer",
    cardCol: "three-col"
  })), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_components__WEBPACK_IMPORTED_MODULE_1__.Sidebar, {
    sidebarSettings: sidebarSettings,
    openInNewTab: true
  })));
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (Homepage);

/***/ }),

/***/ "./src/pages/License/index.jsx":
/*!*************************************!*\
  !*** ./src/pages/License/index.jsx ***!
  \*************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _components__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../components */ "./src/components/index.js");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var sonner__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! sonner */ "./node_modules/sonner/dist/index.mjs");






const License = () => {
  const [showPassword, setShowPassword] = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_2__.useState)(false);
  const [licenseKey, setLicenseKey] = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_2__.useState)('');
  const [isAPIJOB, setIsAPIJOB] = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_2__.useState)(false);
  const [savedLicense, setSavedLicense] = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_2__.useState)(false);
  const [licenseStatus, setLicenseStatus] = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_2__.useState)({
    status: "",
    message: ""
  });
  const [isLoading, setisLoading] = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_2__.useState)(false);
  const activateLicense = e => {
    setIsAPIJOB(true);
    fetch(`${cw_dashboard.ajax_url}?action=cp_control_activate_license&security=${cw_dashboard.LicenseNonce}&cpLicenseKey=${licenseKey}`, {
      headers: {
        Accept: 'application/json',
        'Content-Type': 'application/json',
        'X-WP-NONCE': cw_dashboard.LicenseNonce
      },
      method: 'POST',
      body: JSON.stringify({
        security: cw_dashboard.LicenseNonce,
        licenseKey: licenseKey
      })
    }).then(r => r.json()).then(r => {
      if (r.success) {
        setLicenseKey(r.data.license);
        setLicenseStatus(r.data.status);
        '' != r.data.license ? setSavedLicense(true) : setSavedLicense(false);
        sonner__WEBPACK_IMPORTED_MODULE_5__.toast.success((0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('License activation completed successfully.', 'cookery'));
      } else if (!r.success) {
        '' != r.data.license ? setSavedLicense(true) : setSavedLicense(false);
        setLicenseStatus(r.data.status);
        sonner__WEBPACK_IMPORTED_MODULE_5__.toast.error((0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Error: License activation failed.', 'cookery'));
      }
      setIsAPIJOB(false);
    });
  };
  const deActivateLicense = () => {
    setIsAPIJOB(true);
    fetch(`${cw_dashboard.ajax_url}?action=cp_control_deactivate_license`, {
      headers: {
        Accept: 'application/json',
        'Content-Type': 'application/json'
      },
      method: 'POST'
    }).then(r => r.json()).then(r => {
      if (r.success) {
        setLicenseKey(r.data.license);
        setLicenseStatus(r.data.status);
        sonner__WEBPACK_IMPORTED_MODULE_5__.toast.success((0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('License deactivation completed successfully.', 'cookery'));
      }
      setIsAPIJOB(false);
    });
  };
  (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_2__.useEffect)(() => {
    setisLoading(true);
    fetch(`${cw_dashboard.ajax_url}?action=cp_get_license_status`, {
      headers: {
        Accept: 'application/json',
        'Content-Type': 'application/json'
      },
      method: 'POST'
    }).then(r => r.json()).then(r => {
      setLicenseKey(r.data.license);
      setLicenseStatus(r.data.status);
      if ('' !== r.data.license) {
        setSavedLicense(true);
      }
      setisLoading(false);
    });
  }, [savedLicense]);
  const handleShowPassword = () => {
    setShowPassword(!showPassword);
  };
  const handleResetLicense = () => {
    setisLoading(true);
    fetch(`${cw_dashboard.ajax_url}?action=cp_reset_license_status`, {
      headers: {
        Accept: 'application/json',
        'Content-Type': 'application/json'
      },
      method: 'POST'
    }).then(r => {
      setSavedLicense(false);
      setisLoading(false);
    });
  };
  return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(react__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "cw-license-wrapper"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("h2", {
    className: "title"
  }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)(`Activate ${cw_dashboard.blog_name} License`, "cookery")), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    dangerouslySetInnerHTML: {
      __html: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.sprintf)((0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)("You can find your license key from %1$s your account %2$s on our website. An active license is required to use the theme and receive updates. %3$s If there is an error, please %4$s contact our support %5$s - %6$s How to activate the theme license. %7$s", "cookery"), `<a target="_blank" href=${cw_dashboard.account}>`, '</a>', '<br/>', `<a target="_blank" href=${cw_dashboard.support}>`, '</a>', '<a target="_blank" href="https://blossomthemes.com/active-theme-license/?utm_source=cookery&utm_medium=dashboard&utm_campaign=docs">', '</a>')
    },
    className: "description"
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "license-key"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "license-status"
  }, isLoading ? (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__.Spinner, null) : savedLicense && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("p", {
    dangerouslySetInnerHTML: {
      __html: savedLicense && licenseStatus.message
    }
  }) || (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("p", {
    dangerouslySetInnerHTML: {
      __html: licenseStatus.message
    }
  })), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "license-key-wrapper"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "password-wrapper"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("form", {
    action: "get",
    autoComplete: "off",
    className: "licform",
    onSubmit: e => e.preventDefault()
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("input", {
    autoComplete: "false",
    required: true,
    disabled: isAPIJOB || licenseStatus.status === "valid",
    value: licenseKey,
    type: showPassword ? "text" : "password",
    onChange: event => {
      setLicenseKey(event.target.value);
    },
    placeholder: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)("License Key", 'cookery')
  })), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("button", {
    className: "show-password",
    htmlFor: "password",
    disabled: isAPIJOB || licenseStatus.status === "valid",
    onClick: handleShowPassword
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_components__WEBPACK_IMPORTED_MODULE_3__.Icon, {
    icon: showPassword ? 'hidePassowrd' : 'preview'
  }))), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "button-wrapper"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "cw-btn-wrap"
  }, savedLicense && "valid" === licenseStatus.status && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("button", {
    onClick: deActivateLicense,
    type: "submit",
    style: {
      background: "#DC143C"
    },
    disabled: isAPIJOB,
    className: `actbtn deactivate ${isAPIJOB && `cw-btn-loading`} cw-button-btn primary-btn`
  }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)("Deactivate License", "cookery")), "valid" !== licenseStatus.status && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("button", {
    disabled: !licenseKey || isAPIJOB,
    type: "submit",
    onClick: activateLicense,
    className: `actbtn ${isAPIJOB && `cw-btn-loading`} cw-button-btn primary-btn`
  }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)("Activate License", "cookery")), isAPIJOB && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
    style: {
      marginLeft: '10px'
    },
    className: "cw-svg",
    width: "15",
    height: "15",
    viewBox: "0 0 100 100"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("g", {
    transform: "translate(50,50)"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("g", {
    transform: "scale(1)"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("circle", {
    cx: "0",
    cy: "0",
    r: "50",
    fill: "#687c93"
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("circle", {
    cx: "0",
    cy: "-26",
    r: "12",
    fill: "#ffffff",
    transform: "rotate(161.634)"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("animateTransform", {
    attributeName: "transform",
    type: "rotate",
    calcMode: "linear",
    values: "0 0 0;360 0 0",
    keyTimes: "0;1",
    dur: "1s",
    begin: "0s",
    repeatCount: "indefinite"
  })))))), "valid" !== licenseStatus.status && savedLicense && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "reset-license"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("a", {
    href: "#",
    onClick: handleResetLicense
  }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)('Reset License', 'cookery'))))))));
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (License);

/***/ }),

/***/ "./src/pages/Offers/index.jsx":
/*!************************************!*\
  !*** ./src/pages/Offers/index.jsx ***!
  \************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _components_images__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../components/images */ "./src/components/images.js");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _components__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../components */ "./src/components/index.js");




const Offers = () => {
  const cardLists = [{
    imageurl: _components_images__WEBPACK_IMPORTED_MODULE_1__.themeInstall,
    heading: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Theme Installation and Setup', 'cookery'),
    headingUrl: cw_dashboard.theme_install,
    para: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('With this service, our expert team will install the theme on your WordPress website and make it look like the demo.', 'cookery'),
    buttonText: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('View Details', 'cookery'),
    buttonUrl: cw_dashboard.theme_install
  }, {
    imageurl: _components_images__WEBPACK_IMPORTED_MODULE_1__.GDPR,
    heading: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('GDPR Compliance', 'cookery'),
    headingUrl: cw_dashboard.gdpr_setup,
    para: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('This service helps you integrate all of the required features to protect your visitors’ data, making your website compliant with the new GDPR compliance.', 'cookery'),
    buttonText: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('View Details', 'cookery'),
    buttonUrl: cw_dashboard.gdpr_setup
  }, {
    imageurl: _components_images__WEBPACK_IMPORTED_MODULE_1__.SEO,
    heading: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Must have SEO Setup', 'cookery'),
    headingUrl: cw_dashboard.seo_setup,
    para: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('This Must-Have SEO Setup service will help to optimise your website, increase search visibility and give you insights into how your site is performing.', 'cookery'),
    buttonText: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('View Details', 'cookery'),
    buttonUrl: cw_dashboard.seo_setup
  }, {
    imageurl: _components_images__WEBPACK_IMPORTED_MODULE_1__.plugins,
    heading: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Must Have Plugins Setup', 'cookery'),
    headingUrl: cw_dashboard.plugin_setup,
    para: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('With this service, we will install and configure the essential plugins to turn your site into a powerful engine and keep it safe from hackers.', 'cookery'),
    buttonText: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('View Details', 'cookery'),
    buttonUrl: cw_dashboard.plugin_setup
  }, {
    imageurl: _components_images__WEBPACK_IMPORTED_MODULE_1__.support,
    heading: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('VIP Support', 'cookery'),
    headingUrl: cw_dashboard.vip_support,
    para: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Add 12 months of VIP support to your purchase. With VIP Support, you get the highest priority and faster resolutions to your support ticket!', 'cookery'),
    buttonText: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('View Details', 'cookery'),
    buttonUrl: cw_dashboard.vip_support
  }];
  return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(react__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_components__WEBPACK_IMPORTED_MODULE_3__.Offer, null), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_components__WEBPACK_IMPORTED_MODULE_3__.Card, {
    cardList: cardLists,
    cardPlace: "cw-offer-card",
    cardCol: "three-col"
  }));
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (Offers);

/***/ }),

/***/ "./src/pages/StarterSites/index.jsx":
/*!******************************************!*\
  !*** ./src/pages/StarterSites/index.jsx ***!
  \******************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _components__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../components */ "./src/components/index.js");
/* harmony import */ var _components_images__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../components/images */ "./src/components/images.js");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__);






const StarterSites = () => {
  const [buttonState, setButtonState] = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_4__.useState)('install');
  const [activateUrl, setActivateUrl] = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_4__.useState)([]);
  const demoUrl = `${cw_dashboard.admin_url}themes.php?page=demo-importer-plus`;
  (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_4__.useEffect)(() => {
    const inactivePlugins = cw_dashboard.inactivePlugins;
    const activePlugins = cw_dashboard.activePlugins;
    const demoImporterPlus = inactivePlugins.find(plugin => plugin.slug === "demo-importer-plus");
    if (demoImporterPlus) {
      setButtonState('inactive');
      const url = demoImporterPlus.url.replace(/&amp;/g, '&');
      setActivateUrl([url]);
    } else {
      const demoImporterPlusActive = activePlugins.find(plugin => plugin.slug === "demo-importer-plus");
      if (demoImporterPlusActive) {
        setButtonState('active');
      }
    }
  }, []);
  const handleDemoImporter = () => {
    setButtonState("installing");
    wp.updates.installPlugin({
      slug: "demo-importer-plus",
      success: response => {
        setActivateUrl([response.activateUrl]);
        setButtonState("inactive");
      },
      error: error => {
        console.error(error);
        setButtonState("install");
      }
    });
  };
  async function activatePlugins() {
    setButtonState('activating');
    for (const url of activateUrl) {
      try {
        const urlObj = new URL(url);
        const response = await fetch(url, {
          method: 'POST',
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
          },
          body: new URLSearchParams({
            _wpnonce: urlObj.searchParams.get('_wpnonce'),
            action: 'activate',
            plugin: urlObj.searchParams.get('plugin')
          }).toString()
        });
        if (!response.ok) {
          throw new Error(`HTTP error! status: ${response.status}`);
        }
      } catch (error) {
        console.error(`Error activating plugin: ${url}`, error);
      }
    }
    setButtonState('active');
  }
  return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(react__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "starter-sites"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "image-wrapper"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "image"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("img", {
    src: _components_images__WEBPACK_IMPORTED_MODULE_2__.demo2,
    alt: ""
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "reverse-image"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("img", {
    src: _components_images__WEBPACK_IMPORTED_MODULE_2__.demo2,
    alt: ""
  }))), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "image"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("img", {
    src: _components_images__WEBPACK_IMPORTED_MODULE_2__.mainDemo,
    alt: ""
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "reverse-image"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("img", {
    src: _components_images__WEBPACK_IMPORTED_MODULE_2__.mainDemo,
    alt: ""
  }))), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "image"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("img", {
    src: _components_images__WEBPACK_IMPORTED_MODULE_2__.demo3,
    alt: ""
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "reverse-image"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("img", {
    src: _components_images__WEBPACK_IMPORTED_MODULE_2__.demo3,
    alt: ""
  })))), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "text-wrapper"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("h2", null, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)('One Click Demo Import', 'blossom-pin-pro')), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("p", {
    dangerouslySetInnerHTML: {
      __html: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.sprintf)((0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)('Get started effortlessly! Use our one-click demo import feature to set up your site instantly with all the sample data and settings. Please note that importing demo content will overwrite your existing site content and settings. %s Not recommended if you have existing content. %s', 'blossom-pin-pro'), '<b>', '</b>')
    }
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "cw-button"
  }, (buttonState == "install" || buttonState == "installing") && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("button", {
    className: "cw-button-btn primary-btn",
    onClick: handleDemoImporter
  }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)('Install Starter Sites', 'blossom-pin-pro'), " ", (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_components__WEBPACK_IMPORTED_MODULE_1__.Icon, {
    icon: "arrow"
  }), buttonState == "installing" && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.Spinner, null)), (buttonState == "inactive" || buttonState == "activating") && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("button", {
    className: "cw-button-btn primary-btn",
    onClick: activatePlugins
  }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)('Activate Starter Sites', 'blossom-pin-pro'), " ", (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_components__WEBPACK_IMPORTED_MODULE_1__.Icon, {
    icon: "arrow"
  }), buttonState == "activating" && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.Spinner, null)), buttonState == "active" && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("a", {
    href: demoUrl,
    className: "cw-button-btn primary-btn"
  }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)('Import Starter Sites', 'blossom-pin-pro'), " ", (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_components__WEBPACK_IMPORTED_MODULE_1__.Icon, {
    icon: "arrow"
  }))))));
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (StarterSites);

/***/ }),

/***/ "./src/pages/UsefulPlugins/index.jsx":
/*!*******************************************!*\
  !*** ./src/pages/UsefulPlugins/index.jsx ***!
  \*******************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _components__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../components */ "./src/components/index.js");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__);




const pluginList = [{
  pluginName: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)('WP Delicious – Best WordPress Recipe Plugin', 'cookery'),
  description: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)("A powerful recipe plugin to create and display recipes for bloggers. SEO optimized and Schema-friendly to rank recipes higher on search engines.", "cookery"),
  slug: "delicious-recipes"
}, {
  pluginName: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)('BlossomThemes Toolkit', 'cookery'),
  description: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)("BlossomThemes Toolkit provides you necessary widgets for better and effective blogging.", "cookery"),
  slug: "blossomthemes-toolkit"
}, {
  pluginName: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)('Demo Importer Plus', 'cookery'),
  description: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)("Demo Importer Plus allows you to Import the demo content, widgets, customizer settings and theme settings with a single click without any hassle.", "cookery"),
  slug: "demo-importer-plus"
}, {
  pluginName: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)('BlossomThemes Email Newsletter', 'cookery'),
  description: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)("Easily add email subscription form to your website using shortcode and widget.", "cookery"),
  slug: "blossomthemes-email-newsletter"
}, {
  pluginName: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)('Contact Form 7', 'cookery'),
  description: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)("Just another contact form plugin. Simple but flexible.", "cookery"),
  slug: "contact-form-7"
}, {
  pluginName: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)('Customizer Search', 'cookery'),
  description: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)("Search for settings in customizer.", "cookery"),
  slug: "customizer-search"
}, {
  pluginName: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)('Regenerate Thumbnails', 'cookery'),
  description: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)("Regenerate the thumbnails for one or more of your image uploads. Useful when changing their sizes or your theme.", "cookery"),
  slug: "regenerate-thumbnails"
}, {
  pluginName: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)('Elementor Website Builder', 'cookery'),
  description: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)("Elementor, the leading WordPress website builder,empowers you to build professional, pixel-perfect websites", "cookery"),
  slug: "elementor"
}, {
  pluginName: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)('AffiliateX – Best Amazon Affiliate WordPress Plugin', 'cookery'),
  description: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)("Create a professional-looking affiliate websites with highly customizable blocks that help in increasing the conversion rate and boost your affiliate income.", "cookery"),
  slug: "affiliatex"
}, {
  pluginName: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)('Smash Balloon Social Photo Feed', 'cookery'),
  description: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)("Formerly 'Instagram Feed'. Display clean, customizable, and responsive Instagram feeds from multiple accounts. Supports Instagram oEmbeds.", "cookery"),
  slug: "instagram-feed"
}];
const objectExistsInArray = (obj, array) => {
  return array.some(el => el.slug === obj.slug);
};
const UsefulPlugins = () => {
  const [buttonState, setButtonState] = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_2__.useState)(() => {
    const initialState = {};
    pluginList.forEach(plugin => {
      initialState[plugin.slug] = 'Install';
    });
    return initialState;
  });
  const [activateUrls, setActivateUrls] = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_2__.useState)({});
  (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_2__.useEffect)(() => {
    const activePlugins = cw_dashboard.activePlugins;
    const inactivePlugins = cw_dashboard.inactivePlugins;
    const newButtonState = {};

    // Set state for active plugins
    activePlugins.forEach(plugin => {
      if (objectExistsInArray(plugin, pluginList)) {
        newButtonState[plugin.slug] = 'Activated';
      }
    });

    // Set state for inactive plugins
    inactivePlugins.forEach(plugin => {
      if (objectExistsInArray(plugin, pluginList)) {
        newButtonState[plugin.slug] = 'Activate';
      }
    });
    setButtonState(prevState => ({
      ...prevState,
      ...newButtonState
    }));
    const urls = {};
    inactivePlugins.forEach(plugin => {
      if (objectExistsInArray(plugin, pluginList)) {
        const url = plugin.url.replace(/&amp;/g, '&');
        urls[plugin.slug] = url;
      }
    });
    setActivateUrls(urls);
  }, []);
  const installPlugin = slug => {
    setButtonState(prevState => ({
      ...prevState,
      [slug]: 'Installing...'
    }));
    wp.updates.installPlugin({
      slug: slug,
      success: response => {
        setActivateUrls(prevUrls => ({
          ...prevUrls,
          [slug]: response.activateUrl
        }));
        setButtonState(prevState => ({
          ...prevState,
          [slug]: 'Activate'
        }));
      },
      error: error => {
        console.error(error);
        setButtonState(prevState => ({
          ...prevState,
          [slug]: 'Install'
        }));
      }
    });
  };
  const activatePlugin = async slug => {
    setButtonState(prevState => ({
      ...prevState,
      [slug]: 'Activating...'
    }));
    const url = activateUrls[slug];
    if (url) {
      try {
        const response = await fetch(url, {
          method: 'POST',
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
          },
          body: new URLSearchParams({
            _wpnonce: new URL(url).searchParams.get('_wpnonce'),
            action: 'activate',
            plugin: new URL(url).searchParams.get('plugin')
          }).toString()
        });
        if (!response.ok) {
          throw new Error(`HTTP error! status: ${response.status}`);
        }
        setButtonState(prevState => ({
          ...prevState,
          [slug]: 'Activated'
        }));
      } catch (error) {
        setButtonState(prevState => ({
          ...prevState,
          [slug]: 'Activate'
        }));
      }
    }
  };
  return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "cw-plugin-list-wrapper"
  }, pluginList.map((plugin, index) => (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "cw-plugin-list",
    key: index
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "plugin-detail"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "cw-plugin-title"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_components__WEBPACK_IMPORTED_MODULE_1__.Icon, {
    icon: "pluginList",
    label: plugin.pluginName
  })), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("p", {
    className: "description"
  }, plugin.description)), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "insert-button"
  }, buttonState[plugin.slug] === 'Install' && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("button", {
    className: "cw-button-btn outline",
    onClick: () => installPlugin(plugin.slug)
  }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)('Install', 'cookery')), buttonState[plugin.slug] === 'Installing...' && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("button", {
    className: "cw-button-btn outline",
    disabled: true
  }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)('Installing...', 'cookery')), buttonState[plugin.slug] === 'Activate' && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("button", {
    className: "cw-button-btn outline",
    onClick: () => activatePlugin(plugin.slug)
  }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)('Activate', 'cookery')), buttonState[plugin.slug] === 'Activating...' && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("button", {
    className: "cw-button-btn outline",
    disabled: true
  }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)('Activating...', 'cookery')), buttonState[plugin.slug] === 'Activated' && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("button", {
    className: "cw-button-btn primary-btn deactivate",
    disabled: true
  }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)('Activated', 'cookery'))))));
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (UsefulPlugins);

/***/ }),

/***/ "./src/pages/index.js":
/*!****************************!*\
  !*** ./src/pages/index.js ***!
  \****************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _components__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../components */ "./src/components/index.js");
/* harmony import */ var _Home__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./Home */ "./src/pages/Home/index.jsx");
/* harmony import */ var _License__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./License */ "./src/pages/License/index.jsx");
/* harmony import */ var _Offers__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./Offers */ "./src/pages/Offers/index.jsx");
/* harmony import */ var _UsefulPlugins__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./UsefulPlugins */ "./src/pages/UsefulPlugins/index.jsx");
/* harmony import */ var _StarterSites__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./StarterSites */ "./src/pages/StarterSites/index.jsx");
/* harmony import */ var _FAQ__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./FAQ */ "./src/pages/FAQ/index.jsx");
/* harmony import */ var sonner__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! sonner */ "./node_modules/sonner/dist/index.mjs");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_9___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_9__);











function Dashboard() {
  const [activeTabTitle, setActiveTabTitle] = (0,react__WEBPACK_IMPORTED_MODULE_0__.useState)('Home');
  const tabsData = [{
    title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_9__.__)('Home', 'cookery'),
    icon: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_components__WEBPACK_IMPORTED_MODULE_1__.Icon, {
      icon: "home"
    }),
    content: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_Home__WEBPACK_IMPORTED_MODULE_2__["default"], null)
  }, {
    title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_9__.__)('Starter Sites', 'cookery'),
    icon: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_components__WEBPACK_IMPORTED_MODULE_1__.Icon, {
      icon: "globe"
    }),
    content: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_StarterSites__WEBPACK_IMPORTED_MODULE_6__["default"], null)
  }, {
    title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_9__.__)('Offers', 'cookery'),
    icon: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_components__WEBPACK_IMPORTED_MODULE_1__.Icon, {
      icon: "offers"
    }),
    content: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_Offers__WEBPACK_IMPORTED_MODULE_4__["default"], null)
  }, {
    title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_9__.__)('FAQs', 'cookery'),
    icon: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_components__WEBPACK_IMPORTED_MODULE_1__.Icon, {
      icon: "support"
    }),
    content: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_FAQ__WEBPACK_IMPORTED_MODULE_7__["default"], null)
  }, {
    title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_9__.__)('Useful Plugins', 'cookery'),
    icon: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_components__WEBPACK_IMPORTED_MODULE_1__.Icon, {
      icon: "plugins"
    }),
    content: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_UsefulPlugins__WEBPACK_IMPORTED_MODULE_5__["default"], null)
  }, {
    title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_9__.__)('License', 'cookery'),
    icon: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_components__WEBPACK_IMPORTED_MODULE_1__.Icon, {
      icon: "license"
    }),
    content: (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_License__WEBPACK_IMPORTED_MODULE_3__["default"], null)
  }];
  const handleTabChange = title => {
    setActiveTabTitle(title);
  };
  return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(react__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_components__WEBPACK_IMPORTED_MODULE_1__.Tab, {
    tabsData: tabsData,
    onChange: handleTabChange,
    activeTabTitle: activeTabTitle
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(sonner__WEBPACK_IMPORTED_MODULE_8__.Toaster, {
    richColors: true,
    closeButton: true
  }));
}
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (Dashboard);

/***/ }),

/***/ "./src/scss/style.scss":
/*!*****************************!*\
  !*** ./src/scss/style.scss ***!
  \*****************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./src/assets/img/GDPR.png":
/*!*********************************!*\
  !*** ./src/assets/img/GDPR.png ***!
  \*********************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

module.exports = __webpack_require__.p + "images/GDPR.7cc5d00c.png";

/***/ }),

/***/ "./src/assets/img/SEO.png":
/*!********************************!*\
  !*** ./src/assets/img/SEO.png ***!
  \********************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

module.exports = __webpack_require__.p + "images/SEO.f9cf9541.png";

/***/ }),

/***/ "./src/assets/img/customfonts.png":
/*!****************************************!*\
  !*** ./src/assets/img/customfonts.png ***!
  \****************************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

module.exports = __webpack_require__.p + "images/customfonts.1f621a2e.png";

/***/ }),

/***/ "./src/assets/img/demo-2.webp":
/*!************************************!*\
  !*** ./src/assets/img/demo-2.webp ***!
  \************************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

module.exports = __webpack_require__.p + "images/demo-2.15bc34ca.webp";

/***/ }),

/***/ "./src/assets/img/demo-3.webp":
/*!************************************!*\
  !*** ./src/assets/img/demo-3.webp ***!
  \************************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

module.exports = __webpack_require__.p + "images/demo-3.3f7e473b.webp";

/***/ }),

/***/ "./src/assets/img/freevspro.webp":
/*!***************************************!*\
  !*** ./src/assets/img/freevspro.webp ***!
  \***************************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

module.exports = __webpack_require__.p + "images/freevspro.843ba7e8.webp";

/***/ }),

/***/ "./src/assets/img/logo.png":
/*!*********************************!*\
  !*** ./src/assets/img/logo.png ***!
  \*********************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

module.exports = __webpack_require__.p + "images/logo.0865c1e2.png";

/***/ }),

/***/ "./src/assets/img/main-demo.webp":
/*!***************************************!*\
  !*** ./src/assets/img/main-demo.webp ***!
  \***************************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

module.exports = __webpack_require__.p + "images/main-demo.0e7c1eb8.webp";

/***/ }),

/***/ "./src/assets/img/offer-one.png":
/*!**************************************!*\
  !*** ./src/assets/img/offer-one.png ***!
  \**************************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

module.exports = __webpack_require__.p + "images/offer-one.41e48d2c.png";

/***/ }),

/***/ "./src/assets/img/plugins.png":
/*!************************************!*\
  !*** ./src/assets/img/plugins.png ***!
  \************************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

module.exports = __webpack_require__.p + "images/plugins.0b5fbbcf.png";

/***/ }),

/***/ "./src/assets/img/salesfunnel.png":
/*!****************************************!*\
  !*** ./src/assets/img/salesfunnel.png ***!
  \****************************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

module.exports = __webpack_require__.p + "images/salesfunnel.406c6059.png";

/***/ }),

/***/ "./src/assets/img/support.png":
/*!************************************!*\
  !*** ./src/assets/img/support.png ***!
  \************************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

module.exports = __webpack_require__.p + "images/support.b3a12b5e.png";

/***/ }),

/***/ "./src/assets/img/themeClub.png":
/*!**************************************!*\
  !*** ./src/assets/img/themeClub.png ***!
  \**************************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

module.exports = __webpack_require__.p + "images/themeClub.beb4369e.png";

/***/ }),

/***/ "./src/assets/img/themeinstall.png":
/*!*****************************************!*\
  !*** ./src/assets/img/themeinstall.png ***!
  \*****************************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

module.exports = __webpack_require__.p + "images/themeinstall.fd1c30a5.png";

/***/ }),

/***/ "./src/assets/img/vipsitecare.png":
/*!****************************************!*\
  !*** ./src/assets/img/vipsitecare.png ***!
  \****************************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

module.exports = __webpack_require__.p + "images/vipsitecare.4b6d98f2.png";

/***/ }),

/***/ "react":
/*!************************!*\
  !*** external "React" ***!
  \************************/
/***/ ((module) => {

module.exports = window["React"];

/***/ }),

/***/ "react-dom":
/*!***************************!*\
  !*** external "ReactDOM" ***!
  \***************************/
/***/ ((module) => {

module.exports = window["ReactDOM"];

/***/ }),

/***/ "@wordpress/components":
/*!************************************!*\
  !*** external ["wp","components"] ***!
  \************************************/
/***/ ((module) => {

module.exports = window["wp"]["components"];

/***/ }),

/***/ "@wordpress/dom-ready":
/*!**********************************!*\
  !*** external ["wp","domReady"] ***!
  \**********************************/
/***/ ((module) => {

module.exports = window["wp"]["domReady"];

/***/ }),

/***/ "@wordpress/element":
/*!*********************************!*\
  !*** external ["wp","element"] ***!
  \*********************************/
/***/ ((module) => {

module.exports = window["wp"]["element"];

/***/ }),

/***/ "@wordpress/i18n":
/*!******************************!*\
  !*** external ["wp","i18n"] ***!
  \******************************/
/***/ ((module) => {

module.exports = window["wp"]["i18n"];

/***/ }),

/***/ "./node_modules/sonner/dist/index.mjs":
/*!********************************************!*\
  !*** ./node_modules/sonner/dist/index.mjs ***!
  \********************************************/
/***/ ((__unused_webpack___webpack_module__, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   Toaster: () => (/* binding */ Te),
/* harmony export */   toast: () => (/* binding */ Jt),
/* harmony export */   useSonner: () => (/* binding */ we)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react_dom__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! react-dom */ "react-dom");
"use client";var Ct=s=>{switch(s){case"success":return $t;case"info":return _t;case"warning":return Wt;case"error":return Ut;default:return null}},Ft=Array(12).fill(0),It=({visible:s})=>react__WEBPACK_IMPORTED_MODULE_0__.createElement("div",{className:"sonner-loading-wrapper","data-visible":s},react__WEBPACK_IMPORTED_MODULE_0__.createElement("div",{className:"sonner-spinner"},Ft.map((o,t)=>react__WEBPACK_IMPORTED_MODULE_0__.createElement("div",{className:"sonner-loading-bar",key:`spinner-bar-${t}`})))),$t=react__WEBPACK_IMPORTED_MODULE_0__.createElement("svg",{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 20 20",fill:"currentColor",height:"20",width:"20"},react__WEBPACK_IMPORTED_MODULE_0__.createElement("path",{fillRule:"evenodd",d:"M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z",clipRule:"evenodd"})),Wt=react__WEBPACK_IMPORTED_MODULE_0__.createElement("svg",{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 24 24",fill:"currentColor",height:"20",width:"20"},react__WEBPACK_IMPORTED_MODULE_0__.createElement("path",{fillRule:"evenodd",d:"M9.401 3.003c1.155-2 4.043-2 5.197 0l7.355 12.748c1.154 2-.29 4.5-2.599 4.5H4.645c-2.309 0-3.752-2.5-2.598-4.5L9.4 3.003zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z",clipRule:"evenodd"})),_t=react__WEBPACK_IMPORTED_MODULE_0__.createElement("svg",{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 20 20",fill:"currentColor",height:"20",width:"20"},react__WEBPACK_IMPORTED_MODULE_0__.createElement("path",{fillRule:"evenodd",d:"M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a.75.75 0 000 1.5h.253a.25.25 0 01.244.304l-.459 2.066A1.75 1.75 0 0010.747 15H11a.75.75 0 000-1.5h-.253a.25.25 0 01-.244-.304l.459-2.066A1.75 1.75 0 009.253 9H9z",clipRule:"evenodd"})),Ut=react__WEBPACK_IMPORTED_MODULE_0__.createElement("svg",{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 20 20",fill:"currentColor",height:"20",width:"20"},react__WEBPACK_IMPORTED_MODULE_0__.createElement("path",{fillRule:"evenodd",d:"M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-5a.75.75 0 01.75.75v4.5a.75.75 0 01-1.5 0v-4.5A.75.75 0 0110 5zm0 10a1 1 0 100-2 1 1 0 000 2z",clipRule:"evenodd"}));var Dt=()=>{let[s,o]=react__WEBPACK_IMPORTED_MODULE_0__.useState(document.hidden);return react__WEBPACK_IMPORTED_MODULE_0__.useEffect(()=>{let t=()=>{o(document.hidden)};return document.addEventListener("visibilitychange",t),()=>window.removeEventListener("visibilitychange",t)},[]),s};var ct=1,ut=class{constructor(){this.subscribe=o=>(this.subscribers.push(o),()=>{let t=this.subscribers.indexOf(o);this.subscribers.splice(t,1)});this.publish=o=>{this.subscribers.forEach(t=>t(o))};this.addToast=o=>{this.publish(o),this.toasts=[...this.toasts,o]};this.create=o=>{var b;let{message:t,...n}=o,h=typeof(o==null?void 0:o.id)=="number"||((b=o.id)==null?void 0:b.length)>0?o.id:ct++,u=this.toasts.find(d=>d.id===h),g=o.dismissible===void 0?!0:o.dismissible;return u?this.toasts=this.toasts.map(d=>d.id===h?(this.publish({...d,...o,id:h,title:t}),{...d,...o,id:h,dismissible:g,title:t}):d):this.addToast({title:t,...n,dismissible:g,id:h}),h};this.dismiss=o=>(o||this.toasts.forEach(t=>{this.subscribers.forEach(n=>n({id:t.id,dismiss:!0}))}),this.subscribers.forEach(t=>t({id:o,dismiss:!0})),o);this.message=(o,t)=>this.create({...t,message:o});this.error=(o,t)=>this.create({...t,message:o,type:"error"});this.success=(o,t)=>this.create({...t,type:"success",message:o});this.info=(o,t)=>this.create({...t,type:"info",message:o});this.warning=(o,t)=>this.create({...t,type:"warning",message:o});this.loading=(o,t)=>this.create({...t,type:"loading",message:o});this.promise=(o,t)=>{if(!t)return;let n;t.loading!==void 0&&(n=this.create({...t,promise:o,type:"loading",message:t.loading,description:typeof t.description!="function"?t.description:void 0}));let h=o instanceof Promise?o:o(),u=n!==void 0;return h.then(async g=>{if(Ot(g)&&!g.ok){u=!1;let b=typeof t.error=="function"?await t.error(`HTTP error! status: ${g.status}`):t.error,d=typeof t.description=="function"?await t.description(`HTTP error! status: ${g.status}`):t.description;this.create({id:n,type:"error",message:b,description:d})}else if(t.success!==void 0){u=!1;let b=typeof t.success=="function"?await t.success(g):t.success,d=typeof t.description=="function"?await t.description(g):t.description;this.create({id:n,type:"success",message:b,description:d})}}).catch(async g=>{if(t.error!==void 0){u=!1;let b=typeof t.error=="function"?await t.error(g):t.error,d=typeof t.description=="function"?await t.description(g):t.description;this.create({id:n,type:"error",message:b,description:d})}}).finally(()=>{var g;u&&(this.dismiss(n),n=void 0),(g=t.finally)==null||g.call(t)}),n};this.custom=(o,t)=>{let n=(t==null?void 0:t.id)||ct++;return this.create({jsx:o(n),id:n,...t}),n};this.subscribers=[],this.toasts=[]}},v=new ut,Vt=(s,o)=>{let t=(o==null?void 0:o.id)||ct++;return v.addToast({title:s,...o,id:t}),t},Ot=s=>s&&typeof s=="object"&&"ok"in s&&typeof s.ok=="boolean"&&"status"in s&&typeof s.status=="number",Kt=Vt,Xt=()=>v.toasts,Jt=Object.assign(Kt,{success:v.success,info:v.info,warning:v.warning,error:v.error,custom:v.custom,message:v.message,promise:v.promise,dismiss:v.dismiss,loading:v.loading},{getHistory:Xt});function ft(s,{insertAt:o}={}){if(!s||typeof document=="undefined")return;let t=document.head||document.getElementsByTagName("head")[0],n=document.createElement("style");n.type="text/css",o==="top"&&t.firstChild?t.insertBefore(n,t.firstChild):t.appendChild(n),n.styleSheet?n.styleSheet.cssText=s:n.appendChild(document.createTextNode(s))}ft(`:where(html[dir="ltr"]),:where([data-sonner-toaster][dir="ltr"]){--toast-icon-margin-start: -3px;--toast-icon-margin-end: 4px;--toast-svg-margin-start: -1px;--toast-svg-margin-end: 0px;--toast-button-margin-start: auto;--toast-button-margin-end: 0;--toast-close-button-start: 0;--toast-close-button-end: unset;--toast-close-button-transform: translate(-35%, -35%)}:where(html[dir="rtl"]),:where([data-sonner-toaster][dir="rtl"]){--toast-icon-margin-start: 4px;--toast-icon-margin-end: -3px;--toast-svg-margin-start: 0px;--toast-svg-margin-end: -1px;--toast-button-margin-start: 0;--toast-button-margin-end: auto;--toast-close-button-start: unset;--toast-close-button-end: 0;--toast-close-button-transform: translate(35%, -35%)}:where([data-sonner-toaster]){position:fixed;width:var(--width);font-family:ui-sans-serif,system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;--gray1: hsl(0, 0%, 99%);--gray2: hsl(0, 0%, 97.3%);--gray3: hsl(0, 0%, 95.1%);--gray4: hsl(0, 0%, 93%);--gray5: hsl(0, 0%, 90.9%);--gray6: hsl(0, 0%, 88.7%);--gray7: hsl(0, 0%, 85.8%);--gray8: hsl(0, 0%, 78%);--gray9: hsl(0, 0%, 56.1%);--gray10: hsl(0, 0%, 52.3%);--gray11: hsl(0, 0%, 43.5%);--gray12: hsl(0, 0%, 9%);--border-radius: 8px;box-sizing:border-box;padding:0;margin:0;list-style:none;outline:none;z-index:999999999}:where([data-sonner-toaster][data-x-position="right"]){right:max(var(--offset),env(safe-area-inset-right))}:where([data-sonner-toaster][data-x-position="left"]){left:max(var(--offset),env(safe-area-inset-left))}:where([data-sonner-toaster][data-x-position="center"]){left:50%;transform:translate(-50%)}:where([data-sonner-toaster][data-y-position="top"]){top:max(var(--offset),env(safe-area-inset-top))}:where([data-sonner-toaster][data-y-position="bottom"]){bottom:max(var(--offset),env(safe-area-inset-bottom))}:where([data-sonner-toast]){--y: translateY(100%);--lift-amount: calc(var(--lift) * var(--gap));z-index:var(--z-index);position:absolute;opacity:0;transform:var(--y);filter:blur(0);touch-action:none;transition:transform .4s,opacity .4s,height .4s,box-shadow .2s;box-sizing:border-box;outline:none;overflow-wrap:anywhere}:where([data-sonner-toast][data-styled="true"]){padding:16px;background:var(--normal-bg);border:1px solid var(--normal-border);color:var(--normal-text);border-radius:var(--border-radius);box-shadow:0 4px 12px #0000001a;width:var(--width);font-size:13px;display:flex;align-items:center;gap:6px}:where([data-sonner-toast]:focus-visible){box-shadow:0 4px 12px #0000001a,0 0 0 2px #0003}:where([data-sonner-toast][data-y-position="top"]){top:0;--y: translateY(-100%);--lift: 1;--lift-amount: calc(1 * var(--gap))}:where([data-sonner-toast][data-y-position="bottom"]){bottom:0;--y: translateY(100%);--lift: -1;--lift-amount: calc(var(--lift) * var(--gap))}:where([data-sonner-toast]) :where([data-description]){font-weight:400;line-height:1.4;color:inherit}:where([data-sonner-toast]) :where([data-title]){font-weight:500;line-height:1.5;color:inherit}:where([data-sonner-toast]) :where([data-icon]){display:flex;height:16px;width:16px;position:relative;justify-content:flex-start;align-items:center;flex-shrink:0;margin-left:var(--toast-icon-margin-start);margin-right:var(--toast-icon-margin-end)}:where([data-sonner-toast][data-promise="true"]) :where([data-icon])>svg{opacity:0;transform:scale(.8);transform-origin:center;animation:sonner-fade-in .3s ease forwards}:where([data-sonner-toast]) :where([data-icon])>*{flex-shrink:0}:where([data-sonner-toast]) :where([data-icon]) svg{margin-left:var(--toast-svg-margin-start);margin-right:var(--toast-svg-margin-end)}:where([data-sonner-toast]) :where([data-content]){display:flex;flex-direction:column;gap:2px}[data-sonner-toast][data-styled=true] [data-button]{border-radius:4px;padding-left:8px;padding-right:8px;height:24px;font-size:12px;color:var(--normal-bg);background:var(--normal-text);margin-left:var(--toast-button-margin-start);margin-right:var(--toast-button-margin-end);border:none;cursor:pointer;outline:none;display:flex;align-items:center;flex-shrink:0;transition:opacity .4s,box-shadow .2s}:where([data-sonner-toast]) :where([data-button]):focus-visible{box-shadow:0 0 0 2px #0006}:where([data-sonner-toast]) :where([data-button]):first-of-type{margin-left:var(--toast-button-margin-start);margin-right:var(--toast-button-margin-end)}:where([data-sonner-toast]) :where([data-cancel]){color:var(--normal-text);background:rgba(0,0,0,.08)}:where([data-sonner-toast][data-theme="dark"]) :where([data-cancel]){background:rgba(255,255,255,.3)}:where([data-sonner-toast]) :where([data-close-button]){position:absolute;left:var(--toast-close-button-start);right:var(--toast-close-button-end);top:0;height:20px;width:20px;display:flex;justify-content:center;align-items:center;padding:0;background:var(--gray1);color:var(--gray12);border:1px solid var(--gray4);transform:var(--toast-close-button-transform);border-radius:50%;cursor:pointer;z-index:1;transition:opacity .1s,background .2s,border-color .2s}:where([data-sonner-toast]) :where([data-close-button]):focus-visible{box-shadow:0 4px 12px #0000001a,0 0 0 2px #0003}:where([data-sonner-toast]) :where([data-disabled="true"]){cursor:not-allowed}:where([data-sonner-toast]):hover :where([data-close-button]):hover{background:var(--gray2);border-color:var(--gray5)}:where([data-sonner-toast][data-swiping="true"]):before{content:"";position:absolute;left:0;right:0;height:100%;z-index:-1}:where([data-sonner-toast][data-y-position="top"][data-swiping="true"]):before{bottom:50%;transform:scaleY(3) translateY(50%)}:where([data-sonner-toast][data-y-position="bottom"][data-swiping="true"]):before{top:50%;transform:scaleY(3) translateY(-50%)}:where([data-sonner-toast][data-swiping="false"][data-removed="true"]):before{content:"";position:absolute;inset:0;transform:scaleY(2)}:where([data-sonner-toast]):after{content:"";position:absolute;left:0;height:calc(var(--gap) + 1px);bottom:100%;width:100%}:where([data-sonner-toast][data-mounted="true"]){--y: translateY(0);opacity:1}:where([data-sonner-toast][data-expanded="false"][data-front="false"]){--scale: var(--toasts-before) * .05 + 1;--y: translateY(calc(var(--lift-amount) * var(--toasts-before))) scale(calc(-1 * var(--scale)));height:var(--front-toast-height)}:where([data-sonner-toast])>*{transition:opacity .4s}:where([data-sonner-toast][data-expanded="false"][data-front="false"][data-styled="true"])>*{opacity:0}:where([data-sonner-toast][data-visible="false"]){opacity:0;pointer-events:none}:where([data-sonner-toast][data-mounted="true"][data-expanded="true"]){--y: translateY(calc(var(--lift) * var(--offset)));height:var(--initial-height)}:where([data-sonner-toast][data-removed="true"][data-front="true"][data-swipe-out="false"]){--y: translateY(calc(var(--lift) * -100%));opacity:0}:where([data-sonner-toast][data-removed="true"][data-front="false"][data-swipe-out="false"][data-expanded="true"]){--y: translateY(calc(var(--lift) * var(--offset) + var(--lift) * -100%));opacity:0}:where([data-sonner-toast][data-removed="true"][data-front="false"][data-swipe-out="false"][data-expanded="false"]){--y: translateY(40%);opacity:0;transition:transform .5s,opacity .2s}:where([data-sonner-toast][data-removed="true"][data-front="false"]):before{height:calc(var(--initial-height) + 20%)}[data-sonner-toast][data-swiping=true]{transform:var(--y) translateY(var(--swipe-amount, 0px));transition:none}[data-sonner-toast][data-swipe-out=true][data-y-position=bottom],[data-sonner-toast][data-swipe-out=true][data-y-position=top]{animation:swipe-out .2s ease-out forwards}@keyframes swipe-out{0%{transform:translateY(calc(var(--lift) * var(--offset) + var(--swipe-amount)));opacity:1}to{transform:translateY(calc(var(--lift) * var(--offset) + var(--swipe-amount) + var(--lift) * -100%));opacity:0}}@media (max-width: 600px){[data-sonner-toaster]{position:fixed;--mobile-offset: 16px;right:var(--mobile-offset);left:var(--mobile-offset);width:100%}[data-sonner-toaster] [data-sonner-toast]{left:0;right:0;width:calc(100% - var(--mobile-offset) * 2)}[data-sonner-toaster][data-x-position=left]{left:var(--mobile-offset)}[data-sonner-toaster][data-y-position=bottom]{bottom:20px}[data-sonner-toaster][data-y-position=top]{top:20px}[data-sonner-toaster][data-x-position=center]{left:var(--mobile-offset);right:var(--mobile-offset);transform:none}}[data-sonner-toaster][data-theme=light]{--normal-bg: #fff;--normal-border: var(--gray4);--normal-text: var(--gray12);--success-bg: hsl(143, 85%, 96%);--success-border: hsl(145, 92%, 91%);--success-text: hsl(140, 100%, 27%);--info-bg: hsl(208, 100%, 97%);--info-border: hsl(221, 91%, 91%);--info-text: hsl(210, 92%, 45%);--warning-bg: hsl(49, 100%, 97%);--warning-border: hsl(49, 91%, 91%);--warning-text: hsl(31, 92%, 45%);--error-bg: hsl(359, 100%, 97%);--error-border: hsl(359, 100%, 94%);--error-text: hsl(360, 100%, 45%)}[data-sonner-toaster][data-theme=light] [data-sonner-toast][data-invert=true]{--normal-bg: #000;--normal-border: hsl(0, 0%, 20%);--normal-text: var(--gray1)}[data-sonner-toaster][data-theme=dark] [data-sonner-toast][data-invert=true]{--normal-bg: #fff;--normal-border: var(--gray3);--normal-text: var(--gray12)}[data-sonner-toaster][data-theme=dark]{--normal-bg: #000;--normal-border: hsl(0, 0%, 20%);--normal-text: var(--gray1);--success-bg: hsl(150, 100%, 6%);--success-border: hsl(147, 100%, 12%);--success-text: hsl(150, 86%, 65%);--info-bg: hsl(215, 100%, 6%);--info-border: hsl(223, 100%, 12%);--info-text: hsl(216, 87%, 65%);--warning-bg: hsl(64, 100%, 6%);--warning-border: hsl(60, 100%, 12%);--warning-text: hsl(46, 87%, 65%);--error-bg: hsl(358, 76%, 10%);--error-border: hsl(357, 89%, 16%);--error-text: hsl(358, 100%, 81%)}[data-rich-colors=true][data-sonner-toast][data-type=success],[data-rich-colors=true][data-sonner-toast][data-type=success] [data-close-button]{background:var(--success-bg);border-color:var(--success-border);color:var(--success-text)}[data-rich-colors=true][data-sonner-toast][data-type=info],[data-rich-colors=true][data-sonner-toast][data-type=info] [data-close-button]{background:var(--info-bg);border-color:var(--info-border);color:var(--info-text)}[data-rich-colors=true][data-sonner-toast][data-type=warning],[data-rich-colors=true][data-sonner-toast][data-type=warning] [data-close-button]{background:var(--warning-bg);border-color:var(--warning-border);color:var(--warning-text)}[data-rich-colors=true][data-sonner-toast][data-type=error],[data-rich-colors=true][data-sonner-toast][data-type=error] [data-close-button]{background:var(--error-bg);border-color:var(--error-border);color:var(--error-text)}.sonner-loading-wrapper{--size: 16px;height:var(--size);width:var(--size);position:absolute;inset:0;z-index:10}.sonner-loading-wrapper[data-visible=false]{transform-origin:center;animation:sonner-fade-out .2s ease forwards}.sonner-spinner{position:relative;top:50%;left:50%;height:var(--size);width:var(--size)}.sonner-loading-bar{animation:sonner-spin 1.2s linear infinite;background:var(--gray11);border-radius:6px;height:8%;left:-10%;position:absolute;top:-3.9%;width:24%}.sonner-loading-bar:nth-child(1){animation-delay:-1.2s;transform:rotate(.0001deg) translate(146%)}.sonner-loading-bar:nth-child(2){animation-delay:-1.1s;transform:rotate(30deg) translate(146%)}.sonner-loading-bar:nth-child(3){animation-delay:-1s;transform:rotate(60deg) translate(146%)}.sonner-loading-bar:nth-child(4){animation-delay:-.9s;transform:rotate(90deg) translate(146%)}.sonner-loading-bar:nth-child(5){animation-delay:-.8s;transform:rotate(120deg) translate(146%)}.sonner-loading-bar:nth-child(6){animation-delay:-.7s;transform:rotate(150deg) translate(146%)}.sonner-loading-bar:nth-child(7){animation-delay:-.6s;transform:rotate(180deg) translate(146%)}.sonner-loading-bar:nth-child(8){animation-delay:-.5s;transform:rotate(210deg) translate(146%)}.sonner-loading-bar:nth-child(9){animation-delay:-.4s;transform:rotate(240deg) translate(146%)}.sonner-loading-bar:nth-child(10){animation-delay:-.3s;transform:rotate(270deg) translate(146%)}.sonner-loading-bar:nth-child(11){animation-delay:-.2s;transform:rotate(300deg) translate(146%)}.sonner-loading-bar:nth-child(12){animation-delay:-.1s;transform:rotate(330deg) translate(146%)}@keyframes sonner-fade-in{0%{opacity:0;transform:scale(.8)}to{opacity:1;transform:scale(1)}}@keyframes sonner-fade-out{0%{opacity:1;transform:scale(1)}to{opacity:0;transform:scale(.8)}}@keyframes sonner-spin{0%{opacity:1}to{opacity:.15}}@media (prefers-reduced-motion){[data-sonner-toast],[data-sonner-toast]>*,.sonner-loading-bar{transition:none!important;animation:none!important}}.sonner-loader{position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);transform-origin:center;transition:opacity .2s,transform .2s}.sonner-loader[data-visible=false]{opacity:0;transform:scale(.8) translate(-50%,-50%)}
`);function U(s){return s.label!==void 0}var qt=3,Qt="32px",Zt=4e3,te=356,ee=14,oe=20,ae=200;function ne(...s){return s.filter(Boolean).join(" ")}var se=s=>{var yt,xt,vt,wt,Tt,St,Rt,Et,Nt,Pt;let{invert:o,toast:t,unstyled:n,interacting:h,setHeights:u,visibleToasts:g,heights:b,index:d,toasts:q,expanded:$,removeToast:V,defaultRichColors:Q,closeButton:i,style:O,cancelButtonStyle:K,actionButtonStyle:Z,className:tt="",descriptionClassName:et="",duration:X,position:ot,gap:w,loadingIcon:j,expandByDefault:W,classNames:r,icons:I,closeButtonAriaLabel:at="Close toast",pauseWhenPageIsHidden:k,cn:T}=s,[z,nt]=react__WEBPACK_IMPORTED_MODULE_0__.useState(!1),[D,H]=react__WEBPACK_IMPORTED_MODULE_0__.useState(!1),[st,N]=react__WEBPACK_IMPORTED_MODULE_0__.useState(!1),[M,rt]=react__WEBPACK_IMPORTED_MODULE_0__.useState(!1),[c,m]=react__WEBPACK_IMPORTED_MODULE_0__.useState(0),[y,S]=react__WEBPACK_IMPORTED_MODULE_0__.useState(0),A=react__WEBPACK_IMPORTED_MODULE_0__.useRef(null),l=react__WEBPACK_IMPORTED_MODULE_0__.useRef(null),_=d===0,J=d+1<=g,x=t.type,P=t.dismissible!==!1,Mt=t.className||"",At=t.descriptionClassName||"",G=react__WEBPACK_IMPORTED_MODULE_0__.useMemo(()=>b.findIndex(a=>a.toastId===t.id)||0,[b,t.id]),Lt=react__WEBPACK_IMPORTED_MODULE_0__.useMemo(()=>{var a;return(a=t.closeButton)!=null?a:i},[t.closeButton,i]),mt=react__WEBPACK_IMPORTED_MODULE_0__.useMemo(()=>t.duration||X||Zt,[t.duration,X]),it=react__WEBPACK_IMPORTED_MODULE_0__.useRef(0),Y=react__WEBPACK_IMPORTED_MODULE_0__.useRef(0),pt=react__WEBPACK_IMPORTED_MODULE_0__.useRef(0),F=react__WEBPACK_IMPORTED_MODULE_0__.useRef(null),[gt,zt]=ot.split("-"),ht=react__WEBPACK_IMPORTED_MODULE_0__.useMemo(()=>b.reduce((a,f,p)=>p>=G?a:a+f.height,0),[b,G]),bt=Dt(),jt=t.invert||o,lt=x==="loading";Y.current=react__WEBPACK_IMPORTED_MODULE_0__.useMemo(()=>G*w+ht,[G,ht]),react__WEBPACK_IMPORTED_MODULE_0__.useEffect(()=>{nt(!0)},[]),react__WEBPACK_IMPORTED_MODULE_0__.useLayoutEffect(()=>{if(!z)return;let a=l.current,f=a.style.height;a.style.height="auto";let p=a.getBoundingClientRect().height;a.style.height=f,S(p),u(B=>B.find(R=>R.toastId===t.id)?B.map(R=>R.toastId===t.id?{...R,height:p}:R):[{toastId:t.id,height:p,position:t.position},...B])},[z,t.title,t.description,u,t.id]);let L=react__WEBPACK_IMPORTED_MODULE_0__.useCallback(()=>{H(!0),m(Y.current),u(a=>a.filter(f=>f.toastId!==t.id)),setTimeout(()=>{V(t)},ae)},[t,V,u,Y]);react__WEBPACK_IMPORTED_MODULE_0__.useEffect(()=>{if(t.promise&&x==="loading"||t.duration===1/0||t.type==="loading")return;let a,f=mt;return $||h||k&&bt?(()=>{if(pt.current<it.current){let C=new Date().getTime()-it.current;f=f-C}pt.current=new Date().getTime()})():(()=>{f!==1/0&&(it.current=new Date().getTime(),a=setTimeout(()=>{var C;(C=t.onAutoClose)==null||C.call(t,t),L()},f))})(),()=>clearTimeout(a)},[$,h,W,t,mt,L,t.promise,x,k,bt]),react__WEBPACK_IMPORTED_MODULE_0__.useEffect(()=>{let a=l.current;if(a){let f=a.getBoundingClientRect().height;return S(f),u(p=>[{toastId:t.id,height:f,position:t.position},...p]),()=>u(p=>p.filter(B=>B.toastId!==t.id))}},[u,t.id]),react__WEBPACK_IMPORTED_MODULE_0__.useEffect(()=>{t.delete&&L()},[L,t.delete]);function Yt(){return I!=null&&I.loading?react__WEBPACK_IMPORTED_MODULE_0__.createElement("div",{className:"sonner-loader","data-visible":x==="loading"},I.loading):j?react__WEBPACK_IMPORTED_MODULE_0__.createElement("div",{className:"sonner-loader","data-visible":x==="loading"},j):react__WEBPACK_IMPORTED_MODULE_0__.createElement(It,{visible:x==="loading"})}return react__WEBPACK_IMPORTED_MODULE_0__.createElement("li",{"aria-live":t.important?"assertive":"polite","aria-atomic":"true",role:"status",tabIndex:0,ref:l,className:T(tt,Mt,r==null?void 0:r.toast,(yt=t==null?void 0:t.classNames)==null?void 0:yt.toast,r==null?void 0:r.default,r==null?void 0:r[x],(xt=t==null?void 0:t.classNames)==null?void 0:xt[x]),"data-sonner-toast":"","data-rich-colors":(vt=t.richColors)!=null?vt:Q,"data-styled":!(t.jsx||t.unstyled||n),"data-mounted":z,"data-promise":!!t.promise,"data-removed":D,"data-visible":J,"data-y-position":gt,"data-x-position":zt,"data-index":d,"data-front":_,"data-swiping":st,"data-dismissible":P,"data-type":x,"data-invert":jt,"data-swipe-out":M,"data-expanded":!!($||W&&z),style:{"--index":d,"--toasts-before":d,"--z-index":q.length-d,"--offset":`${D?c:Y.current}px`,"--initial-height":W?"auto":`${y}px`,...O,...t.style},onPointerDown:a=>{lt||!P||(A.current=new Date,m(Y.current),a.target.setPointerCapture(a.pointerId),a.target.tagName!=="BUTTON"&&(N(!0),F.current={x:a.clientX,y:a.clientY}))},onPointerUp:()=>{var B,C,R,dt;if(M||!P)return;F.current=null;let a=Number(((B=l.current)==null?void 0:B.style.getPropertyValue("--swipe-amount").replace("px",""))||0),f=new Date().getTime()-((C=A.current)==null?void 0:C.getTime()),p=Math.abs(a)/f;if(Math.abs(a)>=oe||p>.11){m(Y.current),(R=t.onDismiss)==null||R.call(t,t),L(),rt(!0);return}(dt=l.current)==null||dt.style.setProperty("--swipe-amount","0px"),N(!1)},onPointerMove:a=>{var Bt;if(!F.current||!P)return;let f=a.clientY-F.current.y,p=a.clientX-F.current.x,C=(gt==="top"?Math.min:Math.max)(0,f),R=a.pointerType==="touch"?10:2;Math.abs(C)>R?(Bt=l.current)==null||Bt.style.setProperty("--swipe-amount",`${f}px`):Math.abs(p)>R&&(F.current=null)}},Lt&&!t.jsx?react__WEBPACK_IMPORTED_MODULE_0__.createElement("button",{"aria-label":at,"data-disabled":lt,"data-close-button":!0,onClick:lt||!P?()=>{}:()=>{var a;L(),(a=t.onDismiss)==null||a.call(t,t)},className:T(r==null?void 0:r.closeButton,(wt=t==null?void 0:t.classNames)==null?void 0:wt.closeButton)},react__WEBPACK_IMPORTED_MODULE_0__.createElement("svg",{xmlns:"http://www.w3.org/2000/svg",width:"12",height:"12",viewBox:"0 0 24 24",fill:"none",stroke:"currentColor",strokeWidth:"1.5",strokeLinecap:"round",strokeLinejoin:"round"},react__WEBPACK_IMPORTED_MODULE_0__.createElement("line",{x1:"18",y1:"6",x2:"6",y2:"18"}),react__WEBPACK_IMPORTED_MODULE_0__.createElement("line",{x1:"6",y1:"6",x2:"18",y2:"18"}))):null,t.jsx||react__WEBPACK_IMPORTED_MODULE_0__.isValidElement(t.title)?t.jsx||t.title:react__WEBPACK_IMPORTED_MODULE_0__.createElement(react__WEBPACK_IMPORTED_MODULE_0__.Fragment,null,x||t.icon||t.promise?react__WEBPACK_IMPORTED_MODULE_0__.createElement("div",{"data-icon":"",className:T(r==null?void 0:r.icon,(Tt=t==null?void 0:t.classNames)==null?void 0:Tt.icon)},t.promise||t.type==="loading"&&!t.icon?t.icon||Yt():null,t.type!=="loading"?t.icon||(I==null?void 0:I[x])||Ct(x):null):null,react__WEBPACK_IMPORTED_MODULE_0__.createElement("div",{"data-content":"",className:T(r==null?void 0:r.content,(St=t==null?void 0:t.classNames)==null?void 0:St.content)},react__WEBPACK_IMPORTED_MODULE_0__.createElement("div",{"data-title":"",className:T(r==null?void 0:r.title,(Rt=t==null?void 0:t.classNames)==null?void 0:Rt.title)},t.title),t.description?react__WEBPACK_IMPORTED_MODULE_0__.createElement("div",{"data-description":"",className:T(et,At,r==null?void 0:r.description,(Et=t==null?void 0:t.classNames)==null?void 0:Et.description)},t.description):null),react__WEBPACK_IMPORTED_MODULE_0__.isValidElement(t.cancel)?t.cancel:t.cancel&&U(t.cancel)?react__WEBPACK_IMPORTED_MODULE_0__.createElement("button",{"data-button":!0,"data-cancel":!0,style:t.cancelButtonStyle||K,onClick:a=>{var f,p;U(t.cancel)&&P&&((p=(f=t.cancel).onClick)==null||p.call(f,a),L())},className:T(r==null?void 0:r.cancelButton,(Nt=t==null?void 0:t.classNames)==null?void 0:Nt.cancelButton)},t.cancel.label):null,react__WEBPACK_IMPORTED_MODULE_0__.isValidElement(t.action)?t.action:t.action&&U(t.action)?react__WEBPACK_IMPORTED_MODULE_0__.createElement("button",{"data-button":!0,"data-action":!0,style:t.actionButtonStyle||Z,onClick:a=>{var f,p;U(t.action)&&(a.defaultPrevented||((p=(f=t.action).onClick)==null||p.call(f,a),L()))},className:T(r==null?void 0:r.actionButton,(Pt=t==null?void 0:t.classNames)==null?void 0:Pt.actionButton)},t.action.label):null))};function Ht(){if(typeof window=="undefined"||typeof document=="undefined")return"ltr";let s=document.documentElement.getAttribute("dir");return s==="auto"||!s?window.getComputedStyle(document.documentElement).direction:s}function we(){let[s,o]=react__WEBPACK_IMPORTED_MODULE_0__.useState([]);return react__WEBPACK_IMPORTED_MODULE_0__.useEffect(()=>v.subscribe(t=>{o(n=>{if("dismiss"in t&&t.dismiss)return n.filter(u=>u.id!==t.id);let h=n.findIndex(u=>u.id===t.id);if(h!==-1){let u=[...n];return u[h]={...u[h],...t},u}else return[t,...n]})}),[]),{toasts:s}}var Te=s=>{let{invert:o,position:t="bottom-right",hotkey:n=["altKey","KeyT"],expand:h,closeButton:u,className:g,offset:b,theme:d="light",richColors:q,duration:$,style:V,visibleToasts:Q=qt,toastOptions:i,dir:O=Ht(),gap:K=ee,loadingIcon:Z,icons:tt,containerAriaLabel:et="Notifications",pauseWhenPageIsHidden:X,cn:ot=ne}=s,[w,j]=react__WEBPACK_IMPORTED_MODULE_0__.useState([]),W=react__WEBPACK_IMPORTED_MODULE_0__.useMemo(()=>Array.from(new Set([t].concat(w.filter(c=>c.position).map(c=>c.position)))),[w,t]),[r,I]=react__WEBPACK_IMPORTED_MODULE_0__.useState([]),[at,k]=react__WEBPACK_IMPORTED_MODULE_0__.useState(!1),[T,z]=react__WEBPACK_IMPORTED_MODULE_0__.useState(!1),[nt,D]=react__WEBPACK_IMPORTED_MODULE_0__.useState(d!=="system"?d:typeof window!="undefined"&&window.matchMedia&&window.matchMedia("(prefers-color-scheme: dark)").matches?"dark":"light"),H=react__WEBPACK_IMPORTED_MODULE_0__.useRef(null),st=n.join("+").replace(/Key/g,"").replace(/Digit/g,""),N=react__WEBPACK_IMPORTED_MODULE_0__.useRef(null),M=react__WEBPACK_IMPORTED_MODULE_0__.useRef(!1),rt=react__WEBPACK_IMPORTED_MODULE_0__.useCallback(c=>{var m;(m=w.find(y=>y.id===c.id))!=null&&m.delete||v.dismiss(c.id),j(y=>y.filter(({id:S})=>S!==c.id))},[w]);return react__WEBPACK_IMPORTED_MODULE_0__.useEffect(()=>v.subscribe(c=>{if(c.dismiss){j(m=>m.map(y=>y.id===c.id?{...y,delete:!0}:y));return}setTimeout(()=>{react_dom__WEBPACK_IMPORTED_MODULE_1__.flushSync(()=>{j(m=>{let y=m.findIndex(S=>S.id===c.id);return y!==-1?[...m.slice(0,y),{...m[y],...c},...m.slice(y+1)]:[c,...m]})})})}),[]),react__WEBPACK_IMPORTED_MODULE_0__.useEffect(()=>{if(d!=="system"){D(d);return}d==="system"&&(window.matchMedia&&window.matchMedia("(prefers-color-scheme: dark)").matches?D("dark"):D("light")),typeof window!="undefined"&&window.matchMedia("(prefers-color-scheme: dark)").addEventListener("change",({matches:c})=>{D(c?"dark":"light")})},[d]),react__WEBPACK_IMPORTED_MODULE_0__.useEffect(()=>{w.length<=1&&k(!1)},[w]),react__WEBPACK_IMPORTED_MODULE_0__.useEffect(()=>{let c=m=>{var S,A;n.every(l=>m[l]||m.code===l)&&(k(!0),(S=H.current)==null||S.focus()),m.code==="Escape"&&(document.activeElement===H.current||(A=H.current)!=null&&A.contains(document.activeElement))&&k(!1)};return document.addEventListener("keydown",c),()=>document.removeEventListener("keydown",c)},[n]),react__WEBPACK_IMPORTED_MODULE_0__.useEffect(()=>{if(H.current)return()=>{N.current&&(N.current.focus({preventScroll:!0}),N.current=null,M.current=!1)}},[H.current]),w.length?react__WEBPACK_IMPORTED_MODULE_0__.createElement("section",{"aria-label":`${et} ${st}`,tabIndex:-1},W.map((c,m)=>{var A;let[y,S]=c.split("-");return react__WEBPACK_IMPORTED_MODULE_0__.createElement("ol",{key:c,dir:O==="auto"?Ht():O,tabIndex:-1,ref:H,className:g,"data-sonner-toaster":!0,"data-theme":nt,"data-y-position":y,"data-x-position":S,style:{"--front-toast-height":`${((A=r[0])==null?void 0:A.height)||0}px`,"--offset":typeof b=="number"?`${b}px`:b||Qt,"--width":`${te}px`,"--gap":`${K}px`,...V},onBlur:l=>{M.current&&!l.currentTarget.contains(l.relatedTarget)&&(M.current=!1,N.current&&(N.current.focus({preventScroll:!0}),N.current=null))},onFocus:l=>{l.target instanceof HTMLElement&&l.target.dataset.dismissible==="false"||M.current||(M.current=!0,N.current=l.relatedTarget)},onMouseEnter:()=>k(!0),onMouseMove:()=>k(!0),onMouseLeave:()=>{T||k(!1)},onPointerDown:l=>{l.target instanceof HTMLElement&&l.target.dataset.dismissible==="false"||z(!0)},onPointerUp:()=>z(!1)},w.filter(l=>!l.position&&m===0||l.position===c).map((l,_)=>{var J,x;return react__WEBPACK_IMPORTED_MODULE_0__.createElement(se,{key:l.id,icons:tt,index:_,toast:l,defaultRichColors:q,duration:(J=i==null?void 0:i.duration)!=null?J:$,className:i==null?void 0:i.className,descriptionClassName:i==null?void 0:i.descriptionClassName,invert:o,visibleToasts:Q,closeButton:(x=i==null?void 0:i.closeButton)!=null?x:u,interacting:T,position:c,style:i==null?void 0:i.style,unstyled:i==null?void 0:i.unstyled,classNames:i==null?void 0:i.classNames,cancelButtonStyle:i==null?void 0:i.cancelButtonStyle,actionButtonStyle:i==null?void 0:i.actionButtonStyle,removeToast:rt,toasts:w.filter(P=>P.position==l.position),heights:r.filter(P=>P.position==l.position),setHeights:I,expandByDefault:h,gap:K,loadingIcon:Z,expanded:at,pauseWhenPageIsHidden:X,cn:ot})}))})):null};
//# sourceMappingURL=index.mjs.map

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	(() => {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = (module) => {
/******/ 			var getter = module && module.__esModule ?
/******/ 				() => (module['default']) :
/******/ 				() => (module);
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/global */
/******/ 	(() => {
/******/ 		__webpack_require__.g = (function() {
/******/ 			if (typeof globalThis === 'object') return globalThis;
/******/ 			try {
/******/ 				return this || new Function('return this')();
/******/ 			} catch (e) {
/******/ 				if (typeof window === 'object') return window;
/******/ 			}
/******/ 		})();
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/publicPath */
/******/ 	(() => {
/******/ 		var scriptUrl;
/******/ 		if (__webpack_require__.g.importScripts) scriptUrl = __webpack_require__.g.location + "";
/******/ 		var document = __webpack_require__.g.document;
/******/ 		if (!scriptUrl && document) {
/******/ 			if (document.currentScript)
/******/ 				scriptUrl = document.currentScript.src;
/******/ 			if (!scriptUrl) {
/******/ 				var scripts = document.getElementsByTagName("script");
/******/ 				if(scripts.length) {
/******/ 					var i = scripts.length - 1;
/******/ 					while (i > -1 && (!scriptUrl || !/^http(s?):/.test(scriptUrl))) scriptUrl = scripts[i--].src;
/******/ 				}
/******/ 			}
/******/ 		}
/******/ 		// When supporting browsers where an automatic publicPath is not supported you must specify an output.publicPath manually via configuration
/******/ 		// or pass an empty string ("") and set the __webpack_public_path__ variable from your code to use your own logic.
/******/ 		if (!scriptUrl) throw new Error("Automatic publicPath is not supported in this browser");
/******/ 		scriptUrl = scriptUrl.replace(/#.*$/, "").replace(/\?.*$/, "").replace(/\/[^\/]+$/, "/");
/******/ 		__webpack_require__.p = scriptUrl;
/******/ 	})();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
/*!**********************!*\
  !*** ./src/index.js ***!
  \**********************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_dom_ready__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/dom-ready */ "@wordpress/dom-ready");
/* harmony import */ var _wordpress_dom_ready__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_dom_ready__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _pages__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./pages */ "./src/pages/index.js");
/* harmony import */ var _scss_style_scss__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./scss/style.scss */ "./src/scss/style.scss");





_wordpress_dom_ready__WEBPACK_IMPORTED_MODULE_1___default()(() => {
  const root = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_2__.createRoot)(document.getElementById('cw-dashboard'));
  root.render((0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(react__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_pages__WEBPACK_IMPORTED_MODULE_3__["default"], null)));
});
/******/ })()
;
//# sourceMappingURL=data:application/json;charset=utf-8;base64,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QSxnREFBZ0QsYUFBYTtXQUM3RDs7Ozs7V0NOQTtXQUNBO1dBQ0E7V0FDQTtXQUNBO1dBQ0E7V0FDQTtXQUNBO1dBQ0E7V0FDQTtXQUNBO1dBQ0E7V0FDQTtXQUNBO1dBQ0E7V0FDQTtXQUNBO1dBQ0E7V0FDQTs7Ozs7Ozs7Ozs7Ozs7Ozs7O0FDbEI0QztBQUNJO0FBQ2hCO0FBRUw7QUFFM0JLLDJEQUFRLENBQUMsTUFBTTtFQUNYLE1BQU1FLElBQUksR0FBR0QsOERBQVUsQ0FBQ0UsUUFBUSxDQUFDQyxjQUFjLENBQUMsY0FBYyxDQUFDLENBQUM7RUFDaEVGLElBQUksQ0FBQ0csTUFBTSxDQUNQM1Qsb0RBQUEsQ0FBQWUsMkNBQUEsUUFDSWYsb0RBQUEsQ0FBQ2lULDhDQUFTLE1BQUUsQ0FDZCxDQUNOLENBQUM7QUFDTCxDQUFDLENBQUMsQyIsInNvdXJjZXMiOlsid2VicGFjazovL2Nvb2tlcnkvLi9zcmMvY29tcG9uZW50cy9DYXJkL2luZGV4LmpzeCIsIndlYnBhY2s6Ly9jb29rZXJ5Ly4vc3JjL2NvbXBvbmVudHMvSGVhZGluZy9pbmRleC5qc3giLCJ3ZWJwYWNrOi8vY29va2VyeS8uL3NyYy9jb21wb25lbnRzL0ljb24vaW5kZXguanN4Iiwid2VicGFjazovL2Nvb2tlcnkvLi9zcmMvY29tcG9uZW50cy9PZmZlci9pbmRleC5qc3giLCJ3ZWJwYWNrOi8vY29va2VyeS8uL3NyYy9jb21wb25lbnRzL1NpZGViYXIvaW5kZXguanN4Iiwid2VicGFjazovL2Nvb2tlcnkvLi9zcmMvY29tcG9uZW50cy9UYWJIZWFkZXIvaW5kZXguanN4Iiwid2VicGFjazovL2Nvb2tlcnkvLi9zcmMvY29tcG9uZW50cy9UYWIvaW5kZXguanN4Iiwid2VicGFjazovL2Nvb2tlcnkvLi9zcmMvY29tcG9uZW50cy9UYWIvdXNlVGFicy5qc3giLCJ3ZWJwYWNrOi8vY29va2VyeS8uL3NyYy9jb21wb25lbnRzL2ltYWdlcy5qcyIsIndlYnBhY2s6Ly9jb29rZXJ5Ly4vc3JjL2NvbXBvbmVudHMvaW5kZXguanMiLCJ3ZWJwYWNrOi8vY29va2VyeS8uL3NyYy9wYWdlcy9GQVEvaW5kZXguanN4Iiwid2VicGFjazovL2Nvb2tlcnkvLi9zcmMvcGFnZXMvSG9tZS9pbmRleC5qc3giLCJ3ZWJwYWNrOi8vY29va2VyeS8uL3NyYy9wYWdlcy9MaWNlbnNlL2luZGV4LmpzeCIsIndlYnBhY2s6Ly9jb29rZXJ5Ly4vc3JjL3BhZ2VzL09mZmVycy9pbmRleC5qc3giLCJ3ZWJwYWNrOi8vY29va2VyeS8uL3NyYy9wYWdlcy9TdGFydGVyU2l0ZXMvaW5kZXguanN4Iiwid2VicGFjazovL2Nvb2tlcnkvLi9zcmMvcGFnZXMvVXNlZnVsUGx1Z2lucy9pbmRleC5qc3giLCJ3ZWJwYWNrOi8vY29va2VyeS8uL3NyYy9wYWdlcy9pbmRleC5qcyIsIndlYnBhY2s6Ly9jb29rZXJ5Ly4vc3JjL3Njc3Mvc3R5bGUuc2NzcyIsIndlYnBhY2s6Ly9jb29rZXJ5L2V4dGVybmFsIHdpbmRvdyBcIlJlYWN0XCIiLCJ3ZWJwYWNrOi8vY29va2VyeS9leHRlcm5hbCB3aW5kb3cgXCJSZWFjdERPTVwiIiwid2VicGFjazovL2Nvb2tlcnkvZXh0ZXJuYWwgd2luZG93IFtcIndwXCIsXCJjb21wb25lbnRzXCJdIiwid2VicGFjazovL2Nvb2tlcnkvZXh0ZXJuYWwgd2luZG93IFtcIndwXCIsXCJkb21SZWFkeVwiXSIsIndlYnBhY2s6Ly9jb29rZXJ5L2V4dGVybmFsIHdpbmRvdyBbXCJ3cFwiLFwiZWxlbWVudFwiXSIsIndlYnBhY2s6Ly9jb29rZXJ5L2V4dGVybmFsIHdpbmRvdyBbXCJ3cFwiLFwiaTE4blwiXSIsIndlYnBhY2s6Ly9jb29rZXJ5Ly4vbm9kZV9tb2R1bGVzL3Nvbm5lci9kaXN0L2luZGV4Lm1qcyIsIndlYnBhY2s6Ly9jb29rZXJ5L3dlYnBhY2svYm9vdHN0cmFwIiwid2VicGFjazovL2Nvb2tlcnkvd2VicGFjay9ydW50aW1lL2NvbXBhdCBnZXQgZGVmYXVsdCBleHBvcnQiLCJ3ZWJwYWNrOi8vY29va2VyeS93ZWJwYWNrL3J1bnRpbWUvZGVmaW5lIHByb3BlcnR5IGdldHRlcnMiLCJ3ZWJwYWNrOi8vY29va2VyeS93ZWJwYWNrL3J1bnRpbWUvZ2xvYmFsIiwid2VicGFjazovL2Nvb2tlcnkvd2VicGFjay9ydW50aW1lL2hhc093blByb3BlcnR5IHNob3J0aGFuZCIsIndlYnBhY2s6Ly9jb29rZXJ5L3dlYnBhY2svcnVudGltZS9tYWtlIG5hbWVzcGFjZSBvYmplY3QiLCJ3ZWJwYWNrOi8vY29va2VyeS93ZWJwYWNrL3J1bnRpbWUvcHVibGljUGF0aCIsIndlYnBhY2s6Ly9jb29rZXJ5Ly4vc3JjL2luZGV4LmpzIl0sInNvdXJjZXNDb250ZW50IjpbImltcG9ydCB7IEljb24gfSBmcm9tIFwiLi5cIjtcclxuXHJcbmZ1bmN0aW9uIENhcmQoeyBjYXJkTGlzdCwgY2FyZFBsYWNlLCBjYXJkQ29sIH0pIHtcclxuXHJcbiAgICBjb25zdCBjYXJkTGlzdGluZyA9IChjYXJkKSA9PiB7XHJcbiAgICAgICAgcmV0dXJuIGNhcmQubWFwKChjYXJkaXRlbSwgaW5kZXgpID0+IHtcclxuICAgICAgICAgICAgcmV0dXJuIChcclxuICAgICAgICAgICAgICAgIDxkaXYgY2xhc3NOYW1lPVwiY3ctY2FyZGJvZHlcIiBrZXk9e2luZGV4fT5cclxuICAgICAgICAgICAgICAgICAgICB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGNhcmRpdGVtLmljb25TdmcgfHwgY2FyZGl0ZW0uaW1hZ2V1cmwgJiZcclxuICAgICAgICAgICAgICAgICAgICAgICAgPGRpdiBjbGFzc05hbWU9XCJjdy1pY29uXCI+XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICB7Y2FyZGl0ZW0uaWNvblN2ZyAmJiA8c3BhbiBjbGFzc05hbWU9XCJjdy1pY29uLXN2Z1wiPntjYXJkaXRlbS5pY29uU3ZnfTwvc3Bhbj59XHJcblxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIGNhcmRpdGVtLmltYWdldXJsICYmXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgKGNhcmRpdGVtLmhlYWRpbmdVcmwgP1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8YSB0YXJnZXQ9XCJfYmxhbmtcIiBocmVmPXtjYXJkaXRlbS5oZWFkaW5nVXJsfSA+XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8aW1nIHNyYz17Y2FyZGl0ZW0uaW1hZ2V1cmx9IGNsYXNzTmFtZT1cImN3LWltZ1wiIC8+XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDwvYT4gOlxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8aW1nIHNyYz17Y2FyZGl0ZW0uaW1hZ2V1cmx9IGNsYXNzTmFtZT1cImN3LWltZ1wiIC8+XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgKVxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgICAgICAgICA8L2Rpdj5cclxuICAgICAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgICAgICAgICAgPGRpdiBjbGFzc05hbWU9XCJjdy10ZXh0LXdyYXBcIj5cclxuICAgICAgICAgICAgICAgICAgICAgICAge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgY2FyZGl0ZW0uaGVhZGluZyAmJlxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgKGNhcmRpdGVtLmhlYWRpbmdVcmwgP1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDxhIHRhcmdldD1cIl9ibGFua1wiIGhyZWY9e2NhcmRpdGVtLmhlYWRpbmdVcmx9IGNsYXNzTmFtZT1cImhlYWRpbmctbGlua1wiPlxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8aDMgY2xhc3NOYW1lPVwiY3ctaGVhZGluZ1wiPntjYXJkaXRlbS5oZWFkaW5nfTwvaDM+XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPC9hPiA6XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPGgzIGNsYXNzTmFtZT1cImN3LWhlYWRpbmdcIj57Y2FyZGl0ZW0uaGVhZGluZ308L2gzPlxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgKVxyXG4gICAgICAgICAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIHtjYXJkaXRlbS5wYXJhICYmIDxwIGNsYXNzTmFtZT1cImN3LXRleHRcIj57Y2FyZGl0ZW0ucGFyYX08L3A+fVxyXG4gICAgICAgICAgICAgICAgICAgICAgICA8ZGl2IGNsYXNzTmFtZT1cImN3LWJ1dHRvblwiPlxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAge2NhcmRpdGVtLmJ1dHRvblVybCAmJiBjYXJkaXRlbS5idXR0b25UZXh0ICYmXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPGEgaHJlZj17Y2FyZGl0ZW0uYnV0dG9uVXJsfSBjbGFzc05hbWU9XCJjdy1idG5cIiB0YXJnZXQ9XCJfYmxhbmtcIj57Y2FyZGl0ZW0uYnV0dG9uVGV4dH08SWNvbiBpY29uPVwiYXJyb3dcIiAvPjwvYT5cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgICAgICAgICAgICAgPC9kaXY+XHJcbiAgICAgICAgICAgICAgICAgICAgPC9kaXY+XHJcbiAgICAgICAgICAgICAgICAgICAge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICBjYXJkUGxhY2UgPT09ICdjdy1wcm8nICYmXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIDxkaXYgY2xhc3NOYW1lPVwiY3ctaWNvbi10d29cIj5cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIDxkaXYgY2xhc3NOYW1lPVwiaWNvblwiPjxJY29uIGljb249XCJsb2NrXCIgLz48L2Rpdj5cclxuICAgICAgICAgICAgICAgICAgICAgICAgPC9kaXY+XHJcbiAgICAgICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgPC9kaXY+XHJcbiAgICAgICAgICAgIClcclxuICAgICAgICB9KVxyXG4gICAgfVxyXG4gICAgY29uc3QgY2xhc3NlcyA9IGBjdy1jYXJkICR7Y2FyZFBsYWNlfSAke2NhcmRDb2x9YDtcclxuICAgIHJldHVybiAoXHJcbiAgICAgICAgPD5cclxuICAgICAgICAgICAgPGRpdiBjbGFzc05hbWU9e2NsYXNzZXN9PlxyXG4gICAgICAgICAgICAgICAge1xyXG4gICAgICAgICAgICAgICAgICAgIGNhcmRMaXN0aW5nKGNhcmRMaXN0KVxyXG4gICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICA8L2Rpdj5cclxuICAgICAgICA8Lz5cclxuICAgIClcclxufVxyXG5cclxuZXhwb3J0IGRlZmF1bHQgQ2FyZDsiLCJpbXBvcnQge0ljb259IGZyb20gJy4uJ1xyXG5cclxuZXhwb3J0IGRlZmF1bHQgZnVuY3Rpb24gSGVhZGluZyh7aGVhZGluZywgYnV0dG9uVGV4dCwgYnV0dG9uVXJsLG9wZW5Jbk5ld1RhYn0pIHtcclxuICByZXR1cm4gKFxyXG4gICAgPGRpdiBjbGFzc05hbWU9XCJjdy1zZXR0aW5nc1wiPlxyXG4gICAgICAgIDxoMj57aGVhZGluZ308L2gyPlxyXG4gICAgICAgIDxkaXYgY2xhc3NOYW1lPVwiY3ctYnV0dG9uXCI+XHJcbiAgICAgICAgICAgIDxhIGhyZWY9e2J1dHRvblVybH0gY2xhc3NOYW1lPVwiY3ctYnRuXCIgdGFyZ2V0PXtvcGVuSW5OZXdUYWIgPyBcIl9ibGFua1wiIDogXCJfc2VsZlwifT5cclxuICAgICAgICAgICAge2J1dHRvblRleHR9PEljb24gaWNvbj1cImFycm93XCIvPlxyXG4gICAgICAgICAgICA8L2E+XHJcbiAgICAgICAgPC9kaXY+XHJcbiAgICA8L2Rpdj5cclxuICApXHJcbn0iLCJcclxuXHJcbmNvbnN0IGljb25zID0ge1xyXG4gICAgZ2xvYmU6ICgpID0+IDxzdmcgd2lkdGg9XCIyMFwiIGhlaWdodD1cIjIwXCIgdmlld0JveD1cIjAgMCAyMCAyMFwiIGZpbGw9XCJub25lXCIgeG1sbnM9XCJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2Z1wiPlxyXG4gICAgICAgIDxnIGNsaXBQYXRoPVwidXJsKCNjbGlwMF8yMzg2XzMzNilcIj5cclxuICAgICAgICAgICAgPHBhdGggZD1cIk0xMCAxLjY2NjVDMTIuMDg0NCAzLjk0ODQ2IDEzLjI2OSA2LjkwOTg3IDEzLjMzMzMgOS45OTk4NEMxMy4yNjkgMTMuMDg5OCAxMi4wODQ0IDE2LjA1MTIgMTAgMTguMzMzMk0xMCAxLjY2NjVDNy45MTU2IDMuOTQ4NDYgNi43MzEwNCA2LjkwOTg3IDYuNjY2NjcgOS45OTk4NEM2LjczMTA0IDEzLjA4OTggNy45MTU2IDE2LjA1MTIgMTAgMTguMzMzMk0xMCAxLjY2NjVDNS4zOTc2MyAxLjY2NjUgMS42NjY2NyA1LjM5NzQ2IDEuNjY2NjcgOS45OTk4NEMxLjY2NjY3IDE0LjYwMjIgNS4zOTc2MyAxOC4zMzMyIDEwIDE4LjMzMzJNMTAgMS42NjY1QzE0LjYwMjQgMS42NjY1IDE4LjMzMzMgNS4zOTc0NiAxOC4zMzMzIDkuOTk5ODRDMTguMzMzMyAxNC42MDIyIDE0LjYwMjQgMTguMzMzMiAxMCAxOC4zMzMyTTIuMDgzMzUgNy40OTk4NEgxNy45MTY3TTIuMDgzMzQgMTIuNDk5OEgxNy45MTY3XCIgc3Ryb2tlPVwiY3VycmVudENvbG9yXCIgc3Ryb2tlV2lkdGg9XCIxLjY3XCIgc3Ryb2tsaW5lY2FwPVwicm91bmRcIiBzdHJva2VMaW5lam9pbj1cInJvdW5kXCIgLz5cclxuICAgICAgICA8L2c+XHJcbiAgICAgICAgPGRlZnM+XHJcbiAgICAgICAgICAgIDxjbGlwUGF0aCBpZD1cImNsaXAwXzIzODZfMzM2XCI+XHJcbiAgICAgICAgICAgICAgICA8cmVjdCB3aWR0aD1cIjIwXCIgaGVpZ2h0PVwiMjBcIiAvPlxyXG4gICAgICAgICAgICA8L2NsaXBQYXRoPlxyXG4gICAgICAgIDwvZGVmcz5cclxuICAgIDwvc3ZnPlxyXG4gICAgLFxyXG4gICAgc2l0ZTogKCkgPT4gPHN2ZyB3aWR0aD1cIjMzXCIgaGVpZ2h0PVwiMzJcIiB2aWV3Qm94PVwiMCAwIDMzIDMyXCIgZmlsbD1cIm5vbmVcIiB4bWxucz1cImh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnXCI+XHJcbiAgICAgICAgPHJlY3QgeD1cIjAuNjY2Njg3XCIgd2lkdGg9XCIzMlwiIGhlaWdodD1cIjMyXCIgcng9XCI4XCIgZmlsbD1cInVybCgjcGFpbnQwX2xpbmVhcl8yMzUzXzEyMTIpXCIgLz5cclxuICAgICAgICA8cGF0aCBkPVwiTTkuMTY2NjkgMTMuNUgyNC4xNjY3TTE0LjE2NjcgMTMuNUwxNC4xNjY3IDIzLjVNMTMuMTY2NyA4LjVIMjAuMTY2N0MyMS41NjY4IDguNSAyMi4yNjY5IDguNSAyMi44MDE3IDguNzcyNDhDMjMuMjcyMSA5LjAxMjE3IDIzLjY1NDUgOS4zOTQ2MiAyMy44OTQyIDkuODY1MDJDMjQuMTY2NyAxMC4zOTk4IDI0LjE2NjcgMTEuMDk5OSAyNC4xNjY3IDEyLjVWMTkuNUMyNC4xNjY3IDIwLjkwMDEgMjQuMTY2NyAyMS42MDAyIDIzLjg5NDIgMjIuMTM1QzIzLjY1NDUgMjIuNjA1NCAyMy4yNzIxIDIyLjk4NzggMjIuODAxNyAyMy4yMjc1QzIyLjI2NjkgMjMuNSAyMS41NjY4IDIzLjUgMjAuMTY2NyAyMy41SDEzLjE2NjdDMTEuNzY2NiAyMy41IDExLjA2NjUgMjMuNSAxMC41MzE3IDIzLjIyNzVDMTAuMDYxMyAyMi45ODc4IDkuNjc4ODUgMjIuNjA1NCA5LjQzOTE3IDIyLjEzNUM5LjE2NjY5IDIxLjYwMDIgOS4xNjY2OSAyMC45MDAxIDkuMTY2NjkgMTkuNVYxMi41QzkuMTY2NjkgMTEuMDk5OSA5LjE2NjY5IDEwLjM5OTggOS40MzkxNyA5Ljg2NTAyQzkuNjc4ODUgOS4zOTQ2MiAxMC4wNjEzIDkuMDEyMTcgMTAuNTMxNyA4Ljc3MjQ4QzExLjA2NjUgOC41IDExLjc2NjYgOC41IDEzLjE2NjcgOC41WlwiIHN0cm9rZT1cIndoaXRlXCIgc3Ryb2tlV2lkdGg9XCIxLjY3XCIgc3Ryb2tsaW5lY2FwPVwicm91bmRcIiBzdHJva2VMaW5lam9pbj1cInJvdW5kXCIgLz5cclxuICAgICAgICA8ZGVmcz48bGluZWFyR3JhZGllbnQgaWQ9XCJwYWludDBfbGluZWFyXzIzNTNfMTIxMlwiIHgxPVwiMy4wMDE2NVwiIHkxPVwiMy41XCIgeDI9XCIzMC41MDE2XCIgeTI9XCIzMFwiIGdyYWRpZW50VW5pdHM9XCJ1c2VyU3BhY2VPblVzZVwiPlxyXG4gICAgICAgICAgICA8c3RvcCBzdG9wQ29sb3I9XCIjNTA4MUY1XCIgLz5cclxuICAgICAgICAgICAgPHN0b3Agb2Zmc2V0PVwiMVwiIHN0b3BDb2xvcj1cIiNBNzY5RjVcIiAvPlxyXG4gICAgICAgIDwvbGluZWFyR3JhZGllbnQ+XHJcbiAgICAgICAgPC9kZWZzPlxyXG4gICAgPC9zdmc+LFxyXG4gICAgY29sb3JzZXR0aW5nOiAoKSA9PiA8c3ZnIHdpZHRoPVwiMzJcIiBoZWlnaHQ9XCIzMlwiIHZpZXdCb3g9XCIwIDAgMzIgMzJcIiBmaWxsPVwibm9uZVwiIHhtbG5zPVwiaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmdcIj5cclxuICAgICAgICA8cmVjdCB3aWR0aD1cIjMyXCIgaGVpZ2h0PVwiMzJcIiByeD1cIjhcIiBmaWxsPVwidXJsKCNwYWludDBfbGluZWFyXzIzNTNfMTIyMClcIiAvPlxyXG4gICAgICAgIDxnIGNsaXBQYXRoPVwidXJsKCNjbGlwMF8yMzUzXzEyMjApXCI+XHJcbiAgICAgICAgICAgIDxwYXRoIGQ9XCJNNy42NjY2OSAxNkM3LjY2NjY5IDIwLjYwMjQgMTEuMzk3NiAyNC4zMzM0IDE2IDI0LjMzMzRDMTcuMzgwNyAyNC4zMzM0IDE4LjUgMjMuMjE0MSAxOC41IDIxLjgzMzRWMjEuNDE2N0MxOC41IDIxLjAyOTcgMTguNSAyMC44MzYyIDE4LjUyMTQgMjAuNjczN0MxOC42NjkxIDE5LjU1MTkgMTkuNTUxOSAxOC42NjkxIDIwLjY3MzcgMTguNTIxNEMyMC44MzYyIDE4LjUgMjEuMDI5NyAxOC41IDIxLjQxNjcgMTguNUgyMS44MzM0QzIzLjIxNDEgMTguNSAyNC4zMzM0IDE3LjM4MDcgMjQuMzMzNCAxNkMyNC4zMzM0IDExLjM5NzYgMjAuNjAyNCA3LjY2NjY5IDE2IDcuNjY2NjlDMTEuMzk3NiA3LjY2NjY5IDcuNjY2NjkgMTEuMzk3NiA3LjY2NjY5IDE2WlwiIHN0cm9rZT1cIndoaXRlXCIgc3Ryb2tlV2lkdGg9XCIxLjY3XCIgc3Ryb2tsaW5lY2FwPVwicm91bmRcIiBzdHJva2VMaW5lam9pbj1cInJvdW5kXCIgLz5cclxuICAgICAgICAgICAgPHBhdGggZD1cIk0xMS44MzM0IDE2LjgzMzRDMTIuMjkzNiAxNi44MzM0IDEyLjY2NjcgMTYuNDYwMyAxMi42NjY3IDE2QzEyLjY2NjcgMTUuNTM5OCAxMi4yOTM2IDE1LjE2NjcgMTEuODMzNCAxNS4xNjY3QzExLjM3MzEgMTUuMTY2NyAxMSAxNS41Mzk4IDExIDE2QzExIDE2LjQ2MDMgMTEuMzczMSAxNi44MzM0IDExLjgzMzQgMTYuODMzNFpcIiBzdHJva2U9XCJ3aGl0ZVwiIHN0cm9rZVdpZHRoPVwiMS42N1wiIHN0cm9rbGluZWNhcD1cInJvdW5kXCIgc3Ryb2tlTGluZWpvaW49XCJyb3VuZFwiIC8+XHJcbiAgICAgICAgICAgIDxwYXRoIGQ9XCJNMTkuMzMzNCAxMy41QzE5Ljc5MzYgMTMuNSAyMC4xNjY3IDEzLjEyNjkgMjAuMTY2NyAxMi42NjY3QzIwLjE2NjcgMTIuMjA2NCAxOS43OTM2IDExLjgzMzQgMTkuMzMzNCAxMS44MzM0QzE4Ljg3MzEgMTEuODMzNCAxOC41IDEyLjIwNjQgMTguNSAxMi42NjY3QzE4LjUgMTMuMTI2OSAxOC44NzMxIDEzLjUgMTkuMzMzNCAxMy41WlwiIHN0cm9rZT1cIndoaXRlXCIgc3Ryb2tlV2lkdGg9XCIxLjY3XCIgc3Ryb2tsaW5lY2FwPVwicm91bmRcIiBzdHJva2VMaW5lam9pbj1cInJvdW5kXCIgLz5cclxuICAgICAgICAgICAgPHBhdGggZD1cIk0xNC4zMzM0IDEyLjY2NjdDMTQuNzkzNiAxMi42NjY3IDE1LjE2NjcgMTIuMjkzNiAxNS4xNjY3IDExLjgzMzRDMTUuMTY2NyAxMS4zNzMxIDE0Ljc5MzYgMTEgMTQuMzMzNCAxMUMxMy44NzMxIDExIDEzLjUgMTEuMzczMSAxMy41IDExLjgzMzRDMTMuNSAxMi4yOTM2IDEzLjg3MzEgMTIuNjY2NyAxNC4zMzM0IDEyLjY2NjdaXCIgc3Ryb2tlPVwid2hpdGVcIiBzdHJva2VXaWR0aD1cIjEuNjdcIiBzdHJva2xpbmVjYXA9XCJyb3VuZFwiIHN0cm9rZUxpbmVqb2luPVwicm91bmRcIiAvPlxyXG4gICAgICAgIDwvZz5cclxuICAgICAgICA8ZGVmcz48bGluZWFyR3JhZGllbnQgaWQ9XCJwYWludDBfbGluZWFyXzIzNTNfMTIyMFwiIHgxPVwiMi4zMzQ5NlwiIHkxPVwiMy41XCIgeDI9XCIyOS44MzVcIiB5Mj1cIjMwXCIgZ3JhZGllbnRVbml0cz1cInVzZXJTcGFjZU9uVXNlXCI+XHJcbiAgICAgICAgICAgIDxzdG9wIHN0b3BDb2xvcj1cIiNGNUI4NDFcIiAvPlxyXG4gICAgICAgICAgICA8c3RvcCBvZmZzZXQ9XCIxXCIgc3RvcENvbG9yPVwiI0ZGNzgzMFwiIC8+XHJcbiAgICAgICAgPC9saW5lYXJHcmFkaWVudD5cclxuICAgICAgICAgICAgPGNsaXBQYXRoIGlkPVwiY2xpcDBfMjM1M18xMjIwXCI+XHJcbiAgICAgICAgICAgICAgICA8cmVjdCB3aWR0aD1cIjIwXCIgaGVpZ2h0PVwiMjBcIiBmaWxsPVwid2hpdGVcIiB0cmFuc2Zvcm09XCJ0cmFuc2xhdGUoNiA2KVwiIC8+XHJcbiAgICAgICAgICAgIDwvY2xpcFBhdGg+XHJcbiAgICAgICAgPC9kZWZzPlxyXG4gICAgPC9zdmc+LFxyXG4gICAgdHlwb2dyYXBoeXNldHRpbmc6ICgpID0+IDxzdmcgd2lkdGg9XCIzM1wiIGhlaWdodD1cIjMyXCIgdmlld0JveD1cIjAgMCAzMyAzMlwiIGZpbGw9XCJub25lXCIgeG1sbnM9XCJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2Z1wiPlxyXG4gICAgICAgIDxyZWN0IHg9XCIwLjMzMzM3NFwiIHdpZHRoPVwiMzJcIiBoZWlnaHQ9XCIzMlwiIHJ4PVwiOFwiIGZpbGw9XCJ1cmwoI3BhaW50MF9saW5lYXJfMjM1M18xMjI4KVwiIC8+XHJcbiAgICAgICAgPHBhdGggZD1cIk05LjY2NjY5IDExLjgzMzNDOS42NjY2OSAxMS4wNTY3IDkuNjY2NjkgMTAuNjY4NSA5Ljc5MzU1IDEwLjM2MjJDOS45NjI3MSA5Ljk1Mzc5IDEwLjI4NzIgOS42MjkzNCAxMC42OTU1IDkuNDYwMThDMTEuMDAxOCA5LjMzMzMxIDExLjM5MDEgOS4zMzMzMSAxMi4xNjY3IDkuMzMzMzFIMjAuNUMyMS4yNzY2IDkuMzMzMzEgMjEuNjY0OSA5LjMzMzMxIDIxLjk3MTIgOS40NjAxOEMyMi4zNzk1IDkuNjI5MzQgMjIuNzA0IDkuOTUzNzkgMjIuODczMiAxMC4zNjIyQzIzIDEwLjY2ODUgMjMgMTEuMDU2NyAyMyAxMS44MzMzTTEzIDIyLjY2NjZIMTkuNjY2N00xNC44NzUgOS4zMzMzMVYyMi42NjY2TTE3Ljc5MTcgOS4zMzMzMVYyMi42NjY2XCIgc3Ryb2tlPVwid2hpdGVcIiBzdHJva2VXaWR0aD1cIjEuNjdcIiBzdHJva2xpbmVjYXA9XCJyb3VuZFwiIHN0cm9rZUxpbmVqb2luPVwicm91bmRcIiAvPlxyXG4gICAgICAgIDxkZWZzPjxsaW5lYXJHcmFkaWVudCBpZD1cInBhaW50MF9saW5lYXJfMjM1M18xMjI4XCIgeDE9XCIyLjY2ODMzXCIgeTE9XCIzLjVcIiB4Mj1cIjMwLjE2ODNcIiB5Mj1cIjMwXCIgZ3JhZGllbnRVbml0cz1cInVzZXJTcGFjZU9uVXNlXCI+XHJcbiAgICAgICAgICAgIDxzdG9wIHN0b3BDb2xvcj1cIiNGRjBENzZcIiAvPlxyXG4gICAgICAgICAgICA8c3RvcCBvZmZzZXQ9XCIxXCIgc3RvcENvbG9yPVwiIzU5MEZCN1wiIC8+XHJcbiAgICAgICAgPC9saW5lYXJHcmFkaWVudD5cclxuICAgICAgICA8L2RlZnM+XHJcbiAgICA8L3N2Zz4sXHJcbiAgICBsYXlvdXRzZXR0aW5nOiAoKSA9PiA8c3ZnIHdpZHRoPVwiMzNcIiBoZWlnaHQ9XCIzMlwiIHZpZXdCb3g9XCIwIDAgMzMgMzJcIiBmaWxsPVwibm9uZVwiIHhtbG5zPVwiaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmdcIj5cclxuICAgICAgICA8cmVjdCB4PVwiMC42NjY2ODdcIiB3aWR0aD1cIjMyXCIgaGVpZ2h0PVwiMzJcIiByeD1cIjhcIiBmaWxsPVwidXJsKCNwYWludDBfbGluZWFyXzIzNTNfMTIzNylcIiAvPlxyXG4gICAgICAgIDxwYXRoIGQ9XCJNMjEuMjUgMTUuMTY2N0gxNy4wODM0TTIxLjI1IDE4LjVIMTcuMDgzNE0yMS4yNSAxMS44MzMzSDE3LjA4MzRNMTQuMTY2NyA4LjVMMTQuMTY2NyAyMy41TTEzLjE2NjcgOC41SDIwLjE2NjdDMjEuNTY2OCA4LjUgMjIuMjY2OSA4LjUgMjIuODAxNyA4Ljc3MjQ4QzIzLjI3MjEgOS4wMTIxNyAyMy42NTQ1IDkuMzk0NjIgMjMuODk0MiA5Ljg2NTAyQzI0LjE2NjcgMTAuMzk5OCAyNC4xNjY3IDExLjA5OTkgMjQuMTY2NyAxMi41VjE5LjVDMjQuMTY2NyAyMC45MDAxIDI0LjE2NjcgMjEuNjAwMiAyMy44OTQyIDIyLjEzNUMyMy42NTQ1IDIyLjYwNTQgMjMuMjcyMSAyMi45ODc4IDIyLjgwMTcgMjMuMjI3NUMyMi4yNjY5IDIzLjUgMjEuNTY2OCAyMy41IDIwLjE2NjcgMjMuNUgxMy4xNjY3QzExLjc2NjYgMjMuNSAxMS4wNjY1IDIzLjUgMTAuNTMxNyAyMy4yMjc1QzEwLjA2MTMgMjIuOTg3OCA5LjY3ODg1IDIyLjYwNTQgOS40MzkxNyAyMi4xMzVDOS4xNjY2OSAyMS42MDAyIDkuMTY2NjkgMjAuOTAwMSA5LjE2NjY5IDE5LjVWMTIuNUM5LjE2NjY5IDExLjA5OTkgOS4xNjY2OSAxMC4zOTk4IDkuNDM5MTcgOS44NjUwMkM5LjY3ODg1IDkuMzk0NjIgMTAuMDYxMyA5LjAxMjE3IDEwLjUzMTcgOC43NzI0OEMxMS4wNjY1IDguNSAxMS43NjY2IDguNSAxMy4xNjY3IDguNVpcIiBzdHJva2U9XCJ3aGl0ZVwiIHN0cm9rZVdpZHRoPVwiMS42N1wiIHN0cm9rbGluZWNhcD1cInJvdW5kXCIgc3Ryb2tlTGluZWpvaW49XCJyb3VuZFwiIC8+XHJcbiAgICAgICAgPGRlZnM+PGxpbmVhckdyYWRpZW50IGlkPVwicGFpbnQwX2xpbmVhcl8yMzUzXzEyMzdcIiB4MT1cIjMuMDAxNjVcIiB5MT1cIjMuNVwiIHgyPVwiMzAuNTAxNlwiIHkyPVwiMzBcIiBncmFkaWVudFVuaXRzPVwidXNlclNwYWNlT25Vc2VcIj5cclxuICAgICAgICAgICAgPHN0b3Agc3RvcENvbG9yPVwiI0Y0MDA3NlwiIC8+XHJcbiAgICAgICAgICAgIDxzdG9wIG9mZnNldD1cIjFcIiBzdG9wQ29sb3I9XCIjREY5OEZBXCIgLz5cclxuICAgICAgICA8L2xpbmVhckdyYWRpZW50PlxyXG4gICAgICAgIDwvZGVmcz5cclxuICAgIDwvc3ZnPixcclxuICAgIGZyb250cGFnZXNldHRpbmc6ICgpID0+IDxzdmcgd2lkdGg9XCIzMlwiIGhlaWdodD1cIjMyXCIgdmlld0JveD1cIjAgMCAzMiAzMlwiIGZpbGw9XCJub25lXCIgeG1sbnM9XCJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2Z1wiPlxyXG4gICAgICAgIDxyZWN0IHdpZHRoPVwiMzJcIiBoZWlnaHQ9XCIzMlwiIHJ4PVwiOFwiIGZpbGw9XCJ1cmwoI3BhaW50MF9saW5lYXJfMjM1M18xMjQ1KVwiIC8+XHJcbiAgICAgICAgPHBhdGggZD1cIk0yNC4zMzM0IDEzLjVINy42NjY2OU0xNy42NjY3IDIwLjU4MzNMMTkuNzUgMTguNUwxNy42NjY3IDE2LjQxNjdNMTQuMzMzNCAxNi40MTY3TDEyLjI1IDE4LjVMMTQuMzMzNCAyMC41ODMzTTcuNjY2NjkgMTIuNUw3LjY2NjY5IDE5LjVDNy42NjY2OSAyMC45MDAxIDcuNjY2NjkgMjEuNjAwMiA3LjkzOTE3IDIyLjEzNUM4LjE3ODg1IDIyLjYwNTQgOC41NjEzMSAyMi45ODc4IDkuMDMxNzEgMjMuMjI3NUM5LjU2NjQ5IDIzLjUgMTAuMjY2NiAyMy41IDExLjY2NjcgMjMuNUgyMC4zMzM0QzIxLjczMzUgMjMuNSAyMi40MzM2IDIzLjUgMjIuOTY4MyAyMy4yMjc1QzIzLjQzODcgMjIuOTg3OCAyMy44MjEyIDIyLjYwNTQgMjQuMDYwOSAyMi4xMzVDMjQuMzMzNCAyMS42MDAyIDI0LjMzMzQgMjAuOTAwMSAyNC4zMzM0IDE5LjVWMTIuNUMyNC4zMzM0IDExLjA5OTkgMjQuMzMzNCAxMC4zOTk4IDI0LjA2MDkgOS44NjUwMkMyMy44MjEyIDkuMzk0NjIgMjMuNDM4NyA5LjAxMjE3IDIyLjk2ODMgOC43NzI0OEMyMi40MzM2IDguNSAyMS43MzM1IDguNSAyMC4zMzM0IDguNUwxMS42NjY3IDguNUMxMC4yNjY2IDguNSA5LjU2NjQ5IDguNSA5LjAzMTcxIDguNzcyNDhDOC41NjEzMSA5LjAxMjE3IDguMTc4ODUgOS4zOTQ2MiA3LjkzOTE3IDkuODY1MDJDNy42NjY2OSAxMC4zOTk4IDcuNjY2NjkgMTEuMDk5OSA3LjY2NjY5IDEyLjVaXCIgc3Ryb2tlPVwid2hpdGVcIiBzdHJva2VXaWR0aD1cIjEuNjdcIiBzdHJva2xpbmVjYXA9XCJyb3VuZFwiIHN0cm9rZUxpbmVqb2luPVwicm91bmRcIiAvPlxyXG4gICAgICAgIDxkZWZzPjxsaW5lYXJHcmFkaWVudCBpZD1cInBhaW50MF9saW5lYXJfMjM1M18xMjQ1XCIgeDE9XCIyLjMzNDk2XCIgeTE9XCIzLjVcIiB4Mj1cIjI5LjgzNVwiIHkyPVwiMzBcIiBncmFkaWVudFVuaXRzPVwidXNlclNwYWNlT25Vc2VcIj5cclxuICAgICAgICAgICAgPHN0b3Agc3RvcENvbG9yPVwiI0FGRDc1OVwiIC8+XHJcbiAgICAgICAgICAgIDxzdG9wIG9mZnNldD1cIjFcIiBzdG9wQ29sb3I9XCIjMDBCM0NDXCIgLz5cclxuICAgICAgICA8L2xpbmVhckdyYWRpZW50PlxyXG4gICAgICAgIDwvZGVmcz5cclxuICAgIDwvc3ZnPixcclxuICAgIGdlbmVyYWxzZXR0aW5nOiAoKSA9PiA8c3ZnIHdpZHRoPVwiMzNcIiBoZWlnaHQ9XCIzMlwiIHZpZXdCb3g9XCIwIDAgMzMgMzJcIiBmaWxsPVwibm9uZVwiIHhtbG5zPVwiaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmdcIj5cclxuICAgICAgICA8cmVjdCB4PVwiMC4zMzMzNzRcIiB3aWR0aD1cIjMyXCIgaGVpZ2h0PVwiMzJcIiByeD1cIjhcIiBmaWxsPVwidXJsKCNwYWludDBfbGluZWFyXzIzNTNfMTI1MylcIiAvPlxyXG4gICAgICAgIDxwYXRoIGQ9XCJNMTQuMTYyNiAyMi4xNDI2TDE0LjY0OTcgMjMuMjM3OUMxNC43OTQ0IDIzLjU2NCAxNS4wMzA3IDIzLjg0MSAxNS4zMjk4IDI0LjAzNTVDMTUuNjI5IDI0LjIyOTkgMTUuOTc4MSAyNC4zMzM0IDE2LjMzNDggMjQuMzMzM0MxNi42OTE2IDI0LjMzMzQgMTcuMDQwNyAyNC4yMjk5IDE3LjMzOTggMjQuMDM1NUMxNy42MzkgMjMuODQxIDE3Ljg3NTIgMjMuNTY0IDE4LjAyIDIzLjIzNzlMMTguNTA3MSAyMi4xNDI2QzE4LjY4MDQgMjEuNzUzOSAxOC45NzIxIDIxLjQyOTggMTkuMzQwNCAyMS4yMTY2QzE5LjcxMSAyMS4wMDI4IDIwLjEzOTggMjAuOTExNyAyMC41NjU0IDIwLjk1NjRMMjEuNzU3MSAyMS4wODMzQzIyLjExMTggMjEuMTIwOCAyMi40Njk4IDIxLjA1NDYgMjIuNzg3NiAyMC44OTI3QzIzLjEwNTUgMjAuNzMwOCAyMy4zNjk1IDIwLjQ4MDIgMjMuNTQ3OCAyMC4xNzEzQzIzLjcyNjMgMTkuODYyNSAyMy44MTEzIDE5LjUwODUgMjMuNzkyNiAxOS4xNTI0QzIzLjc3MzggMTguNzk2MiAyMy42NTIxIDE4LjQ1MzEgMjMuNDQyMiAxOC4xNjQ4TDIyLjczNjcgMTcuMTk1M0MyMi40ODU1IDE2Ljg0NzYgMjIuMzUxMiAxNi40MjkgMjIuMzUzNCAxNkMyMi4zNTMzIDE1LjU3MjEgMjIuNDg4OCAxNS4xNTUzIDIyLjc0MDQgMTQuODA5MkwyMy40NDU5IDEzLjgzOThDMjMuNjU1OCAxMy41NTE0IDIzLjc3NzUgMTMuMjA4NCAyMy43OTYzIDEyLjg1MjJDMjMuODE1IDEyLjQ5NiAyMy43MyAxMi4xNDIxIDIzLjU1MTUgMTEuODMzM0MyMy4zNzMzIDExLjUyNDMgMjMuMTA5MiAxMS4yNzM3IDIyLjc5MTMgMTEuMTExOEMyMi40NzM1IDEwLjk0OTkgMjIuMTE1NSAxMC44ODM3IDIxLjc2MDggMTAuOTIxM0wyMC41NjkxIDExLjA0ODFDMjAuMTQzNSAxMS4wOTI4IDE5LjcxNDggMTEuMDAxNyAxOS4zNDQxIDEwLjc4NzlDMTguOTc1IDEwLjU3MzUgMTguNjgzMyAxMC4yNDc4IDE4LjUxMDggOS44NTczN0wxOC4wMiA4Ljc2MkMxNy44NzUyIDguNDM1OTQgMTcuNjM5IDguMTU4ODkgMTcuMzM5OCA3Ljk2NDQ2QzE3LjA0MDcgNy43NzAwMyAxNi42OTE2IDcuNjY2NTcgMTYuMzM0OCA3LjY2NjYzQzE1Ljk3ODEgNy42NjY1NyAxNS42MjkgNy43NzAwMyAxNS4zMjk4IDcuOTY0NDZDMTUuMDMwNyA4LjE1ODg5IDE0Ljc5NDQgOC40MzU5NCAxNC42NDk3IDguNzYyTDE0LjE2MjYgOS44NTczN0MxMy45OTAxIDEwLjI0NzggMTMuNjk4MyAxMC41NzM1IDEzLjMyOTMgMTAuNzg3OUMxMi45NTg2IDExLjAwMTcgMTIuNTI5OCAxMS4wOTI4IDEyLjEwNDMgMTEuMDQ4MUwxMC45MDg5IDEwLjkyMTNDMTAuNTU0MiAxMC44ODM3IDEwLjE5NjIgMTAuOTQ5OSA5Ljg3ODM0IDExLjExMThDOS41NjA0OSAxMS4yNzM3IDkuMjk2NDMgMTEuNTI0MyA5LjExODE3IDExLjgzMzNDOC45Mzk2OSAxMi4xNDIxIDguODU0NjYgMTIuNDk2IDguODczMzkgMTIuODUyMkM4Ljg5MjEzIDEzLjIwODQgOS4wMTM4MyAxMy41NTE0IDkuMjIzNzMgMTMuODM5OEw5LjkyOTI4IDE0LjgwOTJDMTAuMTgwOSAxNS4xNTUzIDEwLjMxNjQgMTUuNTcyMSAxMC4zMTYzIDE2QzEwLjMxNjQgMTYuNDI3OCAxMC4xODA5IDE2Ljg0NDcgOS45MjkyOCAxNy4xOTA3TDkuMjIzNzMgMTguMTYwMUM5LjAxMzgzIDE4LjQ0ODUgOC44OTIxMyAxOC43OTE2IDguODczMzkgMTkuMTQ3N0M4Ljg1NDY2IDE5LjUwMzkgOC45Mzk2OSAxOS44NTc4IDkuMTE4MTcgMjAuMTY2NkM5LjI5NjYgMjAuNDc1NCA5LjU2MDcgMjAuNzI1OSA5Ljg3ODUgMjAuODg3OEMxMC4xOTYzIDIxLjA0OTYgMTAuNTU0MiAyMS4xMTU5IDEwLjkwODkgMjEuMDc4N0wxMi4xMDA2IDIwLjk1MThDMTIuNTI2MSAyMC45MDcxIDEyLjk1NDkgMjAuOTk4MiAxMy4zMjU2IDIxLjIxMkMxMy42OTYgMjEuNDI1OCAxMy45ODkxIDIxLjc1MTYgMTQuMTYyNiAyMi4xNDI2WlwiIHN0cm9rZT1cIndoaXRlXCIgc3Ryb2tlV2lkdGg9XCIxLjY3XCIgc3Ryb2tsaW5lY2FwPVwicm91bmRcIiBzdHJva2VMaW5lam9pbj1cInJvdW5kXCIgLz5cclxuICAgICAgICA8cGF0aCBkPVwiTTE2LjMzMzMgMTguNUMxNy43MTQxIDE4LjUgMTguODMzMyAxNy4zODA3IDE4LjgzMzMgMTZDMTguODMzMyAxNC42MTkyIDE3LjcxNDEgMTMuNSAxNi4zMzMzIDEzLjVDMTQuOTUyNiAxMy41IDEzLjgzMzMgMTQuNjE5MiAxMy44MzMzIDE2QzEzLjgzMzMgMTcuMzgwNyAxNC45NTI2IDE4LjUgMTYuMzMzMyAxOC41WlwiIHN0cm9rZT1cIndoaXRlXCIgc3Ryb2tlV2lkdGg9XCIxLjY3XCIgc3Ryb2tsaW5lY2FwPVwicm91bmRcIiBzdHJva2VMaW5lam9pbj1cInJvdW5kXCIgLz5cclxuICAgICAgICA8ZGVmcz48bGluZWFyR3JhZGllbnQgaWQ9XCJwYWludDBfbGluZWFyXzIzNTNfMTI1M1wiIHgxPVwiMi42NjgzM1wiIHkxPVwiMy41XCIgeDI9XCIzMC4xNjgzXCIgeTI9XCIzMFwiIGdyYWRpZW50VW5pdHM9XCJ1c2VyU3BhY2VPblVzZVwiPlxyXG4gICAgICAgICAgICA8c3RvcCBzdG9wQ29sb3I9XCIjRUQ3Qjg0XCIgLz5cclxuICAgICAgICAgICAgPHN0b3Agb2Zmc2V0PVwiMVwiIHN0b3BDb2xvcj1cIiM5MDU1RkZcIiAvPlxyXG4gICAgICAgIDwvbGluZWFyR3JhZGllbnQ+XHJcbiAgICAgICAgPC9kZWZzPlxyXG4gICAgPC9zdmc+LFxyXG4gICAgaW5zdGFncmFtc2V0dGluZzogKCkgPT4gPHN2ZyB3aWR0aD1cIjMzXCIgaGVpZ2h0PVwiMzJcIiB2aWV3Qm94PVwiMCAwIDMzIDMyXCIgZmlsbD1cIm5vbmVcIiB4bWxucz1cImh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnXCI+XHJcbiAgICAgICAgPHJlY3QgeD1cIjAuNjY2Njg3XCIgd2lkdGg9XCIzMlwiIGhlaWdodD1cIjMyXCIgcng9XCI4XCIgZmlsbD1cInVybCgjcGFpbnQwX2xpbmVhcl8yMzUzXzEyNjIpXCIgLz5cclxuICAgICAgICA8cGF0aCBkPVwiTTEzLjE2NjcgNy42NjY2M0gyMC4xNjY3QzIyLjgzMzQgNy42NjY2MyAyNSA5LjgzMzI5IDI1IDEyLjVWMTkuNUMyNSAyMC43ODE4IDI0LjQ5MDggMjIuMDExMiAyMy41ODQ0IDIyLjkxNzZDMjIuNjc4IDIzLjgyNDEgMjEuNDQ4NiAyNC4zMzMzIDIwLjE2NjcgMjQuMzMzM0gxMy4xNjY3QzEwLjUgMjQuMzMzMyA4LjMzMzM3IDIyLjE2NjYgOC4zMzMzNyAxOS41VjEyLjVDOC4zMzMzNyAxMS4yMTgxIDguODQyNiA5Ljk4ODcgOS43NDkwMiA5LjA4MjI4QzEwLjY1NTUgOC4xNzU4NSAxMS44ODQ4IDcuNjY2NjMgMTMuMTY2NyA3LjY2NjYzWk0xMyA5LjMzMzI5QzEyLjIwNDQgOS4zMzMyOSAxMS40NDEzIDkuNjQ5MzYgMTAuODc4NyAxMC4yMTJDMTAuMzE2MSAxMC43NzQ2IDEwIDExLjUzNzYgMTAgMTIuMzMzM1YxOS42NjY2QzEwIDIxLjMyNSAxMS4zNDE3IDIyLjY2NjYgMTMgMjIuNjY2NkgyMC4zMzM0QzIxLjEyOSAyMi42NjY2IDIxLjg5MjEgMjIuMzUwNiAyMi40NTQ3IDIxLjc4NzlDMjMuMDE3MyAyMS4yMjUzIDIzLjMzMzQgMjAuNDYyMyAyMy4zMzM0IDE5LjY2NjZWMTIuMzMzM0MyMy4zMzM0IDEwLjY3NSAyMS45OTE3IDkuMzMzMjkgMjAuMzMzNCA5LjMzMzI5SDEzWk0yMS4wNDE3IDEwLjU4MzNDMjEuMzE4IDEwLjU4MzMgMjEuNTgyOSAxMC42OTMgMjEuNzc4MyAxMC44ODg0QzIxLjk3MzYgMTEuMDgzNyAyMi4wODM0IDExLjM0ODcgMjIuMDgzNCAxMS42MjVDMjIuMDgzNCAxMS45MDEyIDIxLjk3MzYgMTIuMTY2MiAyMS43NzgzIDEyLjM2MTVDMjEuNTgyOSAxMi41NTY5IDIxLjMxOCAxMi42NjY2IDIxLjA0MTcgMTIuNjY2NkMyMC43NjU0IDEyLjY2NjYgMjAuNTAwNSAxMi41NTY5IDIwLjMwNTEgMTIuMzYxNUMyMC4xMDk4IDEyLjE2NjIgMjAgMTEuOTAxMiAyMCAxMS42MjVDMjAgMTEuMzQ4NyAyMC4xMDk4IDExLjA4MzcgMjAuMzA1MSAxMC44ODg0QzIwLjUwMDUgMTAuNjkzIDIwLjc2NTQgMTAuNTgzMyAyMS4wNDE3IDEwLjU4MzNaTTE2LjY2NjcgMTEuODMzM0MxNy43NzE4IDExLjgzMzMgMTguODMxNiAxMi4yNzIzIDE5LjYxMyAxMy4wNTM3QzIwLjM5NDQgMTMuODM1MSAyMC44MzM0IDE0Ljg5NDkgMjAuODMzNCAxNkMyMC44MzM0IDE3LjEwNSAyMC4zOTQ0IDE4LjE2NDggMTkuNjEzIDE4Ljk0NjJDMTguODMxNiAxOS43Mjc2IDE3Ljc3MTggMjAuMTY2NiAxNi42NjY3IDIwLjE2NjZDMTUuNTYxNiAyMC4xNjY2IDE0LjUwMTggMTkuNzI3NiAxMy43MjA0IDE4Ljk0NjJDMTIuOTM5IDE4LjE2NDggMTIuNSAxNy4xMDUgMTIuNSAxNkMxMi41IDE0Ljg5NDkgMTIuOTM5IDEzLjgzNTEgMTMuNzIwNCAxMy4wNTM3QzE0LjUwMTggMTIuMjcyMyAxNS41NjE2IDExLjgzMzMgMTYuNjY2NyAxMS44MzMzWk0xNi42NjY3IDEzLjVDMTYuMDAzNyAxMy41IDE1LjM2NzggMTMuNzYzNCAxNC44OTg5IDE0LjIzMjJDMTQuNDMwMSAxNC43MDEgMTQuMTY2NyAxNS4zMzY5IDE0LjE2NjcgMTZDMTQuMTY2NyAxNi42NjMgMTQuNDMwMSAxNy4yOTg5IDE0Ljg5ODkgMTcuNzY3N0MxNS4zNjc4IDE4LjIzNjYgMTYuMDAzNyAxOC41IDE2LjY2NjcgMTguNUMxNy4zMjk3IDE4LjUgMTcuOTY1NiAxOC4yMzY2IDE4LjQzNDUgMTcuNzY3N0MxOC45MDMzIDE3LjI5ODkgMTkuMTY2NyAxNi42NjMgMTkuMTY2NyAxNkMxOS4xNjY3IDE1LjMzNjkgMTguOTAzMyAxNC43MDEgMTguNDM0NSAxNC4yMzIyQzE3Ljk2NTYgMTMuNzYzNCAxNy4zMjk3IDEzLjUgMTYuNjY2NyAxMy41WlwiIGZpbGw9XCJ3aGl0ZVwiIC8+XHJcbiAgICAgICAgPGRlZnM+PGxpbmVhckdyYWRpZW50IGlkPVwicGFpbnQwX2xpbmVhcl8yMzUzXzEyNjJcIiB4MT1cIjMuMDAxNjVcIiB5MT1cIjMuNVwiIHgyPVwiMzAuNTAxNlwiIHkyPVwiMzBcIiBncmFkaWVudFVuaXRzPVwidXNlclNwYWNlT25Vc2VcIj5cclxuICAgICAgICAgICAgPHN0b3Agc3RvcENvbG9yPVwiI0UyMzNGRlwiIC8+XHJcbiAgICAgICAgICAgIDxzdG9wIG9mZnNldD1cIjFcIiBzdG9wQ29sb3I9XCIjRkY2QjAwXCIgLz5cclxuICAgICAgICA8L2xpbmVhckdyYWRpZW50PlxyXG4gICAgICAgIDwvZGVmcz5cclxuICAgIDwvc3ZnPixcclxuICAgIHNvY2lhbG1lZGlhOiAoKSA9PiA8c3ZnIHdpZHRoPVwiMzJcIiBoZWlnaHQ9XCIzMlwiIHZpZXdCb3g9XCIwIDAgMzIgMzJcIiBmaWxsPVwibm9uZVwiIHhtbG5zPVwiaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmdcIj5cclxuICAgICAgICA8cmVjdCB3aWR0aD1cIjMyXCIgaGVpZ2h0PVwiMzJcIiByeD1cIjhcIiBmaWxsPVwidXJsKCNwYWludDBfbGluZWFyXzIzNTNfMTI3MClcIiAvPlxyXG4gICAgICAgIDxwYXRoIGQ9XCJNMTMuMTU4MyAxNy4yNTgzTDE4Ljg1IDIwLjU3NU0xOC44NDE3IDExLjQyNUwxMy4xNTgzIDE0Ljc0MTZNMjMuNSAxMC4xNjY2QzIzLjUgMTEuNTQ3MyAyMi4zODA3IDEyLjY2NjYgMjEgMTIuNjY2NkMxOS42MTkzIDEyLjY2NjYgMTguNSAxMS41NDczIDE4LjUgMTAuMTY2NkMxOC41IDguNzg1OTEgMTkuNjE5MyA3LjY2NjYzIDIxIDcuNjY2NjNDMjIuMzgwNyA3LjY2NjYzIDIzLjUgOC43ODU5MSAyMy41IDEwLjE2NjZaTTEzLjUgMTZDMTMuNSAxNy4zODA3IDEyLjM4MDcgMTguNSAxMSAxOC41QzkuNjE5MjkgMTguNSA4LjUgMTcuMzgwNyA4LjUgMTZDOC41IDE0LjYxOTIgOS42MTkyOSAxMy41IDExIDEzLjVDMTIuMzgwNyAxMy41IDEzLjUgMTQuNjE5MiAxMy41IDE2Wk0yMy41IDIxLjgzMzNDMjMuNSAyMy4yMTQgMjIuMzgwNyAyNC4zMzMzIDIxIDI0LjMzMzNDMTkuNjE5MyAyNC4zMzMzIDE4LjUgMjMuMjE0IDE4LjUgMjEuODMzM0MxOC41IDIwLjQ1MjYgMTkuNjE5MyAxOS4zMzMzIDIxIDE5LjMzMzNDMjIuMzgwNyAxOS4zMzMzIDIzLjUgMjAuNDUyNiAyMy41IDIxLjgzMzNaXCIgc3Ryb2tlPVwid2hpdGVcIiBzdHJva2VXaWR0aD1cIjEuNjdcIiBzdHJva2xpbmVjYXA9XCJyb3VuZFwiIHN0cm9rZUxpbmVqb2luPVwicm91bmRcIiAvPlxyXG4gICAgICAgIDxkZWZzPjxsaW5lYXJHcmFkaWVudCBpZD1cInBhaW50MF9saW5lYXJfMjM1M18xMjcwXCIgeDE9XCIyLjMzNDk2XCIgeTE9XCIzLjVcIiB4Mj1cIjI5LjgzNVwiIHkyPVwiMzBcIiBncmFkaWVudFVuaXRzPVwidXNlclNwYWNlT25Vc2VcIj5cclxuICAgICAgICAgICAgPHN0b3Agc3RvcENvbG9yPVwiIzJGODBFRFwiIC8+XHJcbiAgICAgICAgICAgIDxzdG9wIG9mZnNldD1cIjFcIiBzdG9wQ29sb3I9XCIjQjJGRkRBXCIgLz5cclxuICAgICAgICA8L2xpbmVhckdyYWRpZW50PlxyXG4gICAgICAgIDwvZGVmcz5cclxuICAgIDwvc3ZnPixcclxuICAgIGZvb3RlcnNldHRpbmc6ICgpID0+IDxzdmcgd2lkdGg9XCIzM1wiIGhlaWdodD1cIjMyXCIgdmlld0JveD1cIjAgMCAzMyAzMlwiIGZpbGw9XCJub25lXCIgeG1sbnM9XCJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2Z1wiPlxyXG4gICAgICAgIDxyZWN0IHg9XCIwLjMzMzM3NFwiIHdpZHRoPVwiMzJcIiBoZWlnaHQ9XCIzMlwiIHJ4PVwiOFwiIGZpbGw9XCJ1cmwoI3BhaW50MF9saW5lYXJfMjM1M18xMjc4KVwiIC8+XHJcbiAgICAgICAgPHBhdGggZD1cIk04LjgzMzM3IDguNUg4Ljg0MTcxTTguODMzMzcgMTZIOC44NDE3MU04LjgzMzM3IDE5Ljc1SDguODQxNzFNOC44MzMzNyAxMi4yNUg4Ljg0MTcxTTEyLjU4MzQgOC41SDEyLjU5MTdNMTIuNTgzNCAxNkgxMi41OTE3TTIwLjA4MzQgOC41SDIwLjA5MTdNMjAuMDgzNCAxNkgyMC4wOTE3TTE2LjMzMzQgOC41SDE2LjM0MTdNMTYuMzMzNCAxNkgxNi4zNDE3TTE2LjMzMzQgMTkuNzVIMTYuMzQxN00xNi4zMzM0IDEyLjI1SDE2LjM0MTdNMjMuODMzNCA4LjVIMjMuODQxN00yMy44MzM0IDE2SDIzLjg0MTdNMjMuODMzNCAxOS43NUgyMy44NDE3TTIzLjgzMzQgMTIuMjVIMjMuODQxN00yMy44MzM0IDIzLjVIOC44MzMzN1wiIHN0cm9rZT1cIndoaXRlXCIgc3Ryb2tlV2lkdGg9XCIxLjY3XCIgc3Ryb2tlTGluZWNhcD1cInJvdW5kXCIgc3Ryb2tlTGluZWpvaW49XCJyb3VuZFwiIC8+XHJcbiAgICAgICAgPGRlZnM+PGxpbmVhckdyYWRpZW50IGlkPVwicGFpbnQwX2xpbmVhcl8yMzUzXzEyNzhcIiB4MT1cIjIuNjY4MzNcIiB5MT1cIjMuNVwiIHgyPVwiMzAuMTY4M1wiIHkyPVwiMzBcIiBncmFkaWVudFVuaXRzPVwidXNlclNwYWNlT25Vc2VcIj5cclxuICAgICAgICAgICAgPHN0b3Agc3RvcENvbG9yPVwiI0RGOThGQVwiIC8+XHJcbiAgICAgICAgICAgIDxzdG9wIG9mZnNldD1cIjFcIiBzdG9wQ29sb3I9XCIjOTA1NUZGXCIgLz5cclxuICAgICAgICA8L2xpbmVhckdyYWRpZW50PlxyXG4gICAgICAgIDwvZGVmcz5cclxuICAgIDwvc3ZnPixcclxuICAgIGhvbWU6ICgpID0+IDxzdmcgd2lkdGg9XCIyMFwiIGhlaWdodD1cIjIwXCIgdmlld0JveD1cIjAgMCAyMCAyMFwiIGZpbGw9XCJub25lXCIgeG1sbnM9XCJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2Z1wiPlxyXG4gICAgICAgIDxwYXRoIGQ9XCJNMi41IDguODA0MzNDMi41IDguMzI1NyAyLjUgOC4wODYzOSAyLjU2MTY5IDcuODY2QzIuNjE2MzMgNy42NzA3OCAyLjcwNjE0IDcuNDg3MTYgMi44MjY2OSA3LjMyNDE3QzIuOTYyNzggNy4xNDAxNyAzLjE1MTY4IDYuOTkzMjQgMy41Mjk0OSA2LjY5OTM5TDkuMTgxNDEgMi4zMDM0NUM5LjQ3NDE4IDIuMDc1NzQgOS42MjA1NyAxLjk2MTg5IDkuNzgyMjEgMS45MTgxMkM5LjkyNDg0IDEuODc5NTEgMTAuMDc1MiAxLjg3OTUxIDEwLjIxNzggMS45MTgxMkMxMC4zNzk0IDEuOTYxODkgMTAuNTI1OCAyLjA3NTc0IDEwLjgxODYgMi4zMDM0NUwxNi40NzA1IDYuNjk5MzlDMTYuODQ4MyA2Ljk5MzI0IDE3LjAzNzIgNy4xNDAxNyAxNy4xNzMzIDcuMzI0MTdDMTcuMjkzOSA3LjQ4NzE2IDE3LjM4MzcgNy42NzA3OCAxNy40MzgzIDcuODY2QzE3LjUgOC4wODYzOSAxNy41IDguMzI1NyAxNy41IDguODA0MzNWMTQuODMzNEMxNy41IDE1Ljc2NjkgMTcuNSAxNi4yMzM2IDE3LjMxODMgMTYuNTkwMUMxNy4xNTg2IDE2LjkwMzcgMTYuOTAzNiAxNy4xNTg3IDE2LjU5IDE3LjMxODVDMTYuMjMzNSAxNy41MDAxIDE1Ljc2NjggMTcuNTAwMSAxNC44MzMzIDE3LjUwMDFINS4xNjY2N0M0LjIzMzI1IDE3LjUwMDEgMy43NjY1NCAxNy41MDAxIDMuNDEwMDIgMTcuMzE4NUMzLjA5NjQxIDE3LjE1ODcgMi44NDE0NCAxNi45MDM3IDIuNjgxNjYgMTYuNTkwMUMyLjUgMTYuMjMzNiAyLjUgMTUuNzY2OSAyLjUgMTQuODMzNFY4LjgwNDMzWlwiIHN0cm9rZT1cImN1cnJlbnRDb2xvclwiIHN0cm9rZVdpZHRoPVwiMS42N1wiIHN0cm9rbGluZWNhcD1cInJvdW5kXCIgc3Ryb2tlTGluZWpvaW49XCJyb3VuZFwiIC8+XHJcbiAgICA8L3N2Zz4sXHJcbiAgICBmcmVlUHJvOiAoKSA9PiA8c3ZnIHdpZHRoPVwiMjBcIiBoZWlnaHQ9XCIyMFwiIHZpZXdCb3g9XCIwIDAgMjAgMjBcIiBmaWxsPVwibm9uZVwiIHhtbG5zPVwiaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmdcIj5cclxuICAgICAgICA8ZyBjbGlwUGF0aD1cInVybCgjY2xpcDBfMjM4Nl8zNDMpXCI+XHJcbiAgICAgICAgICAgIDxwYXRoIGQ9XCJNMTAgMS42NjY1TDEzIDQuNjY2NUMxNSAtMC41ODM0OTYgMjAuNTgzMyA0Ljk5OTg0IDE1LjMzMzMgNi45OTk4NEwxOC4zMzMzIDkuOTk5ODRMMTUuMzMzMyAxMi45OTk4QzEzLjMzMzMgNy43NDk4NCA3Ljc1MDAxIDEzLjMzMzIgMTMgMTUuMzMzMkwxMCAxOC4zMzMyTDcgMTUuMzMzMkM1IDIwLjU4MzIgLTAuNTgzMzI4IDE0Ljk5OTggNC42NjY2NyAxMi45OTk4TDEuNjY2NjcgOS45OTk4NEw0LjY2NjY3IDYuOTk5ODRDNi42NjY2NyAxMi4yNDk4IDEyLjI1IDYuNjY2NSA3IDQuNjY2NUwxMCAxLjY2NjVaXCIgc3Ryb2tlPVwiY3VycmVudENvbG9yXCIgc3Ryb2tlV2lkdGg9XCIxLjY3XCIgc3Ryb2tlTGluZWNhcD1cInJvdW5kXCIgc3Ryb2tlTGluZWpvaW49XCJyb3VuZFwiIC8+XHJcbiAgICAgICAgPC9nPlxyXG4gICAgICAgIDxkZWZzPlxyXG4gICAgICAgICAgICA8Y2xpcFBhdGggaWQ9XCJjbGlwMF8yMzg2XzM0M1wiPlxyXG4gICAgICAgICAgICAgICAgPHJlY3Qgd2lkdGg9XCIyMFwiIGhlaWdodD1cIjIwXCIgZmlsbD1cIm5vbmVcIiAvPlxyXG4gICAgICAgICAgICA8L2NsaXBQYXRoPlxyXG4gICAgICAgIDwvZGVmcz5cclxuICAgIDwvc3ZnPixcclxuICAgIG9mZmVyczogKCkgPT4gPHN2ZyB3aWR0aD1cIjIwXCIgaGVpZ2h0PVwiMjBcIiB2aWV3Qm94PVwiMCAwIDIwIDIwXCIgZmlsbD1cIm5vbmVcIiB4bWxucz1cImh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnXCI+XHJcbiAgICAgICAgPHBhdGggZD1cIk02LjY2NjY3IDYuNjY2NUg2LjY3NTAxTTEuNjY2NjcgNC4zMzMxN0wxLjY2NjY3IDguMDYxOTNDMS42NjY2NyA4LjQ2OTU4IDEuNjY2NjcgOC42NzM0MSAxLjcxMjcyIDguODY1MjJDMS43NTM1NSA5LjAzNTI4IDEuODIwODkgOS4xOTc4NiAxLjkxMjI3IDkuMzQ2OThDMi4wMTUzNCA5LjUxNTE3IDIuMTU5NDcgOS42NTkzIDIuNDQ3NzIgOS45NDc1NUw4LjgzODI0IDE2LjMzODFDOS44MjgyOSAxNy4zMjgxIDEwLjMyMzMgMTcuODIzMSAxMC44OTQxIDE4LjAwODZDMTEuMzk2MiAxOC4xNzE4IDExLjkzNzEgMTguMTcxOCAxMi40MzkyIDE4LjAwODZDMTMuMDEgMTcuODIzMSAxMy41MDUxIDE3LjMyODEgMTQuNDk1MSAxNi4zMzgxTDE2LjMzODIgMTQuNDk0OUMxNy4zMjgzIDEzLjUwNDkgMTcuODIzMyAxMy4wMDk5IDE4LjAwODggMTIuNDM5QzE4LjE3MTkgMTEuOTM2OSAxOC4xNzE5IDExLjM5NjEgMTguMDA4OCAxMC44OTRDMTcuODIzMyAxMC4zMjMxIDE3LjMyODMgOS44MjgxMiAxNi4zMzgyIDguODM4MDhMOS45NDc3MiAyLjQ0NzU1QzkuNjU5NDcgMi4xNTkzIDkuNTE1MzQgMi4wMTUxNyA5LjM0NzE1IDEuOTEyMUM5LjE5ODAyIDEuODIwNzIgOS4wMzU0NSAxLjc1MzM4IDguODY1MzkgMS43MTI1NUM4LjY3MzU4IDEuNjY2NSA4LjQ2OTc1IDEuNjY2NSA4LjA2MjEgMS42NjY1TDQuMzMzMzQgMS42NjY1QzMuMzk5OTIgMS42NjY1IDIuOTMzMjEgMS42NjY1IDIuNTc2NjkgMS44NDgxNkMyLjI2MzA4IDIuMDA3OTUgMi4wMDgxMiAyLjI2MjkyIDEuODQ4MzMgMi41NzY1MkMxLjY2NjY3IDIuOTMzMDQgMS42NjY2NyAzLjM5OTc1IDEuNjY2NjcgNC4zMzMxN1pNNy4wODMzNCA2LjY2NjVDNy4wODMzNCA2Ljg5NjYyIDYuODk2NzkgNy4wODMxNyA2LjY2NjY3IDcuMDgzMTdDNi40MzY1NSA3LjA4MzE3IDYuMjUwMDEgNi44OTY2MiA2LjI1MDAxIDYuNjY2NUM2LjI1MDAxIDYuNDM2MzkgNi40MzY1NSA2LjI0OTg0IDYuNjY2NjcgNi4yNDk4NEM2Ljg5Njc5IDYuMjQ5ODQgNy4wODMzNCA2LjQzNjM5IDcuMDgzMzQgNi42NjY1WlwiIHN0cm9rZT1cImN1cnJlbnRDb2xvclwiIHN0cm9rZVdpZHRoPVwiMS42N1wiIHN0cm9rZUxpbmVjYXA9XCJyb3VuZFwiIHN0cm9rZUxpbmVqb2luPVwicm91bmRcIiAvPlxyXG4gICAgPC9zdmc+LFxyXG4gICAgcGx1Z2luczogKCkgPT4gPHN2ZyB3aWR0aD1cIjIwXCIgaGVpZ2h0PVwiMjBcIiB2aWV3Qm94PVwiMCAwIDIwIDIwXCIgZmlsbD1cIm5vbmVcIiB4bWxucz1cImh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnXCI+XHJcbiAgICAgICAgPHBhdGggZD1cIk0xOC43ODgzIDQuOTYxNjhDMTguNzAxMiA0Ljg3NDI4IDE4LjU5NzcgNC44MDQ5NCAxOC40ODM3IDQuNzU3NjJDMTguMzY5OCA0LjcxMDMgMTguMjQ3NiA0LjY4NTk1IDE4LjEyNDIgNC42ODU5NUMxOC4wMDA4IDQuNjg1OTUgMTcuODc4NyA0LjcxMDMgMTcuNzY0NyA0Ljc1NzYyQzE3LjY1MDggNC44MDQ5NCAxNy41NDczIDQuODc0MjggMTcuNDYwMiA0Ljk2MTY4TDE1IDcuNDIxODRMMTIuNTc4MSA0Ljk5OTk3TDE1LjA0MDYgMi41MzgyNUMxNS4yMTY4IDIuMzYyMTMgMTUuMzE1NyAyLjEyMzI2IDE1LjMxNTcgMS44NzQxOEMxNS4zMTU3IDEuNjI1MTEgMTUuMjE2OCAxLjM4NjI0IDE1LjA0MDYgMS4yMTAxMkMxNC44NjQ1IDEuMDM0IDE0LjYyNTYgMC45MzUwNTkgMTQuMzc2NiAwLjkzNTA1OUMxNC4xMjc1IDAuOTM1MDU5IDEzLjg4ODYgMS4wMzQgMTMuNzEyNSAxLjIxMDEyTDExLjI1IDMuNjcxODRMOS40MTMyOSAxLjgzNjY4QzkuMzI2MDggMS43NDk0OCA5LjIyMjU1IDEuNjgwMyA5LjEwODYxIDEuNjMzMTFDOC45OTQ2NyAxLjU4NTkxIDguODcyNTUgMS41NjE2MiA4Ljc0OTIyIDEuNTYxNjJDOC41MDAxNSAxLjU2MTYyIDguMjYxMjggMS42NjA1NiA4LjA4NTE2IDEuODM2NjhDNy45MDkwNCAyLjAxMjgxIDcuODEwMSAyLjI1MTY4IDcuODEwMSAyLjUwMDc1QzcuODEwMSAyLjc0OTgyIDcuOTA5MDQgMi45ODg2OSA4LjA4NTE2IDMuMTY0ODFMOC4zNTkzOCAzLjQzNzQ3TDQuNDQ0NTQgNy4zNTQ2NUM0LjEyNTI4IDcuNjczODYgMy44NzIwMyA4LjA1MjgzIDMuNjk5MjUgOC40Njk5MkMzLjUyNjQ3IDguODg3MDEgMy40Mzc1NCA5LjMzNDA1IDMuNDM3NTQgOS43ODU1MUMzLjQzNzU0IDEwLjIzNyAzLjUyNjQ3IDEwLjY4NCAzLjY5OTI1IDExLjEwMTFDMy44NzIwMyAxMS41MTgyIDQuMTI1MjggMTEuODk3MiA0LjQ0NDU0IDEyLjIxNjRMNS40NTA3OSAxMy4yMjI2TDEuODM2NzIgMTYuODM2N0MxLjc0OTUyIDE2LjkyMzkgMS42ODAzNCAxNy4wMjc0IDEuNjMzMTUgMTcuMTQxNEMxLjU4NTk1IDE3LjI1NTMgMS41NjE2NiAxNy4zNzc0IDEuNTYxNjYgMTcuNTAwN0MxLjU2MTY2IDE3LjYyNDEgMS41ODU5NSAxNy43NDYyIDEuNjMzMTUgMTcuODYwMUMxLjY4MDM0IDE3Ljk3NDEgMS43NDk1MiAxOC4wNzc2IDEuODM2NzIgMTguMTY0OEMyLjAxMjg0IDE4LjM0MDkgMi4yNTE3MiAxOC40Mzk5IDIuNTAwNzkgMTguNDM5OUMyLjYyNDExIDE4LjQzOTkgMi43NDYyNCAxOC40MTU2IDIuODYwMTggMTguMzY4NEMyLjk3NDEyIDE4LjMyMTIgMy4wNzc2NCAxOC4yNTIgMy4xNjQ4NSAxOC4xNjQ4TDYuNzc4OTEgMTQuNTUwN0w3Ljc4NTE2IDE1LjU1N0M4LjEwNDM3IDE1Ljg3NjMgOC40ODMzNCAxNi4xMjk1IDguOTAwNDMgMTYuMzAyM0M5LjMxNzUyIDE2LjQ3NTEgOS43NjQ1NiAxNi41NjQgMTAuMjE2IDE2LjU2NEMxMC42Njc1IDE2LjU2NCAxMS4xMTQ1IDE2LjQ3NTEgMTEuNTMxNiAxNi4zMDIzQzExLjk0ODcgMTYuMTI5NSAxMi4zMjc3IDE1Ljg3NjMgMTIuNjQ2OSAxNS41NTdMMTYuNTYyNSAxMS42NDA2TDE2LjgzNjcgMTEuOTE1NkMxNi45MjM5IDEyLjAwMjggMTcuMDI3NSAxMi4wNzIgMTcuMTQxNCAxMi4xMTkyQzE3LjI1NTMgMTIuMTY2NCAxNy4zNzc1IDEyLjE5MDcgMTcuNTAwOCAxMi4xOTA3QzE3LjYyNDEgMTIuMTkwNyAxNy43NDYyIDEyLjE2NjQgMTcuODYwMiAxMi4xMTkyQzE3Ljk3NDEgMTIuMDcyIDE4LjA3NzYgMTIuMDAyOCAxOC4xNjQ4IDExLjkxNTZDMTguMjUyMSAxMS44Mjg0IDE4LjMyMTIgMTEuNzI0OSAxOC4zNjg0IDExLjYxMDlDMTguNDE1NiAxMS40OTcgMTguNDM5OSAxMS4zNzQ5IDE4LjQzOTkgMTEuMjUxNUMxOC40Mzk5IDExLjEyODIgMTguNDE1NiAxMS4wMDYxIDE4LjM2ODQgMTAuODkyMUMxOC4zMjEyIDEwLjc3ODIgMTguMjUyMSAxMC42NzQ3IDE4LjE2NDggMTAuNTg3NUwxNi4zMjgxIDguNzQ5OTdMMTguNzkwNiA2LjI4ODI1QzE4Ljg3NzYgNi4yMDEwMiAxOC45NDY2IDYuMDk3NTEgMTguOTkzNiA1Ljk4MzYxQzE5LjA0MDYgNS44Njk3MiAxOS4wNjQ2IDUuNzQ3NjggMTkuMDY0NCA1LjYyNDQ4QzE5LjA2NDIgNS41MDEyOCAxOS4wMzk3IDUuMzc5MzMgMTguOTkyMyA1LjI2NTZDMTguOTQ0OSA1LjE1MTg3IDE4Ljg3NTYgNS4wNDg2IDE4Ljc4ODMgNC45NjE2OFpNMTEuMzE5NSAxNC4yMjk3QzExLjE3NDQgMTQuMzc0OCAxMS4wMDIyIDE0LjQ5IDEwLjgxMjUgMTQuNTY4NUMxMC42MjI5IDE0LjY0NzEgMTAuNDE5NyAxNC42ODc1IDEwLjIxNDUgMTQuNjg3NUMxMC4wMDkyIDE0LjY4NzUgOS44MDU5OCAxNC42NDcxIDkuNjE2MzcgMTQuNTY4NUM5LjQyNjc2IDE0LjQ5IDkuMjU0NDggMTQuMzc0OCA5LjEwOTM4IDE0LjIyOTdMNS43NzAzMiAxMC44OTA2QzUuNjI1MTYgMTAuNzQ1NSA1LjUxMDAxIDEwLjU3MzIgNS40MzE0NSAxMC4zODM2QzUuMzUyODggMTAuMTk0IDUuMzEyNDUgOS45OTA3NiA1LjMxMjQ1IDkuNzg1NTFDNS4zMTI0NSA5LjU4MDI3IDUuMzUyODggOS4zNzcwNCA1LjQzMTQ1IDkuMTg3NDJDNS41MTAwMSA4Ljk5NzgxIDUuNjI1MTYgOC44MjU1MyA1Ljc3MDMyIDguNjgwNDNMOS42ODc1MSA0Ljc2NTU5TDE1LjIzNDQgMTAuMzEyNUwxMS4zMTk1IDE0LjIyOTdaXCIgZmlsbD1cImN1cnJlbnRDb2xvclwiIC8+XHJcbiAgICA8L3N2Zz4sXHJcbiAgICBsaWNlbnNlOiAoKSA9PiA8c3ZnIHdpZHRoPVwiMjBcIiBoZWlnaHQ9XCIyMFwiIHZpZXdCb3g9XCIwIDAgMjAgMjBcIiBmaWxsPVwibm9uZVwiIHhtbG5zPVwiaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmdcIj5cclxuICAgICAgICA8cGF0aCBkPVwiTTUuNDE2NjcgMTYuNjY2NUg0LjE2NjY3QzMuMjQ2MTkgMTYuNjY2NSAyLjUgMTUuOTIwMyAyLjUgMTQuOTk5OFYzLjMzMzE3QzIuNSAyLjQxMjcgMy4yNDYxOSAxLjY2NjUgNC4xNjY2NyAxLjY2NjVIMTUuODMzM0MxNi43NTM4IDEuNjY2NSAxNy41IDIuNDEyNyAxNy41IDMuMzMzMTdWMTQuOTk5OEMxNy41IDE1LjkyMDMgMTYuNzUzOCAxNi42NjY1IDE1LjgzMzMgMTYuNjY2NUgxNC41ODMzTTEwIDE1LjgzMzJDMTEuMzgwNyAxNS44MzMyIDEyLjUgMTQuNzEzOSAxMi41IDEzLjMzMzJDMTIuNSAxMS45NTI1IDExLjM4MDcgMTAuODMzMiAxMCAxMC44MzMyQzguNjE5MjkgMTAuODMzMiA3LjUgMTEuOTUyNSA3LjUgMTMuMzMzMkM3LjUgMTQuNzEzOSA4LjYxOTI5IDE1LjgzMzIgMTAgMTUuODMzMlpNMTAgMTUuODMzMkwxMC4wMTc5IDE1LjgzM0w3LjM1NzIzIDE4LjQ5MzZMNS4wMDAyIDE2LjEzNjZMNy41MTYzOCAxMy42MjA0TTEwIDE1LjgzMzJMMTIuNjYwNyAxOC40OTM2TDE1LjAxNzcgMTYuMTM2NkwxMi41MDE1IDEzLjYyMDRNNy41IDQuOTk5ODRIMTIuNU01LjgzMzMzIDcuOTE2NUgxNC4xNjY3XCIgc3Ryb2tlPVwiY3VycmVudENvbG9yXCIgc3Ryb2tlV2lkdGg9XCIxLjY3XCIgc3Ryb2tlTGluZWNhcD1cInJvdW5kXCIgc3Ryb2tlTGluZWpvaW49XCJyb3VuZFwiIC8+XHJcbiAgICA8L3N2Zz4sXHJcbiAgICBhcnJvdzogKCkgPT4gPHN2ZyB3aWR0aD1cIjEzXCIgaGVpZ2h0PVwiMTBcIiB2aWV3Qm94PVwiMCAwIDEzIDEwXCIgZmlsbD1cIm5vbmVcIiB4bWxucz1cImh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnXCI+XHJcbiAgICAgICAgPHBhdGggZD1cIk0xLjE2NjY5IDVIMTEuODMzNE0xMS44MzM0IDVMNy44MzMzNSAxTTExLjgzMzQgNUw3LjgzMzM1IDlcIiBzdHJva2U9XCIjNjI2NkVBXCIgc3Ryb2tlV2lkdGg9XCIxLjVcIiBzdHJva2VMaW5lY2FwPVwicm91bmRcIiBzdHJva2VMaW5lam9pbj1cInJvdW5kXCIgLz5cclxuICAgIDwvc3ZnPixcclxuICAgIHlvdXR1YmU6ICgpID0+IDxzdmcgd2lkdGg9XCIyMFwiIGhlaWdodD1cIjIwXCIgdmlld0JveD1cIjAgMCAyMCAyMFwiIGZpbGw9XCJub25lXCIgeG1sbnM9XCJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2Z1wiPlxyXG4gICAgICAgIDxwYXRoIGZpbGxSdWxlPVwiZXZlbm9kZFwiIGNsaXBSdWxlPVwiZXZlbm9kZFwiIGQ9XCJNOS45OTk5NiAzLjMzMzVDMTAuNzEyNSAzLjMzMzUgMTEuNDQzMyAzLjM1MTgzIDEyLjE1MTYgMy4zODE4M0wxMi45ODgzIDMuNDIxODNMMTMuNzg5MSAzLjQ2OTMzTDE0LjUzOTEgMy41MjAxNkwxNS4yMjQxIDMuNTczNUMxNS45Njc1IDMuNjMwMzkgMTYuNjY3IDMuOTQ3NjIgMTcuMTk5NiA0LjQ2OTM2QzE3LjczMjEgNC45OTExMSAxOC4wNjM2IDUuNjgzOTUgMTguMTM1OCA2LjQyNkwxOC4xNjkxIDYuNzgwMTZMMTguMjMxNiA3LjUzODVDMTguMjkgOC4zMjQzMyAxOC4zMzMzIDkuMTgxIDE4LjMzMzMgMTAuMDAwMkMxOC4zMzMzIDEwLjgxOTMgMTguMjkgMTEuNjc2IDE4LjIzMTYgMTIuNDYxOEwxOC4xNjkxIDEzLjIyMDJDMTguMTU4MyAxMy4zNDE4IDE4LjE0NzUgMTMuNDU5MyAxOC4xMzU4IDEzLjU3NDNDMTguMDYzNiAxNC4zMTY1IDE3LjczMiAxNS4wMDk1IDE3LjE5OTIgMTUuNTMxMkMxNi42NjY1IDE2LjA1MyAxNS45NjY4IDE2LjM3MDEgMTUuMjIzMyAxNi40MjY4TDE0LjU0IDE2LjQ3OTNMMTMuNzkgMTYuNTMxTDEyLjk4ODMgMTYuNTc4NUwxMi4xNTE2IDE2LjYxODVDMTEuNDM0OCAxNi42NDk2IDEwLjcxNzQgMTYuNjY1OCA5Ljk5OTk2IDE2LjY2NjhDOS4yODI0OCAxNi42NjU4IDguNTY1MSAxNi42NDk2IDcuODQ4MjkgMTYuNjE4NUw3LjAxMTYzIDE2LjU3ODVMNi4yMTA3OSAxNi41MzFMNS40NjA3OSAxNi40NzkzTDQuNzc1NzkgMTYuNDI2OEM0LjAzMjQyIDE2LjM2OTkgMy4zMzI5MiAxNi4wNTI3IDIuODAwMzUgMTUuNTMxQzIuMjY3NzkgMTUuMDA5MiAxLjkzNjI3IDE0LjMxNjQgMS44NjQxMyAxMy41NzQzTDEuODMwNzkgMTMuMjIwMkwxLjc2ODI5IDEyLjQ2MThDMS43MDQ1NyAxMS42NDI4IDEuNjcwNjYgMTAuODIxNyAxLjY2NjYzIDEwLjAwMDJDMS42NjY2MyA5LjE4MSAxLjcwOTk2IDguMzI0MzMgMS43NjgyOSA3LjUzODVMMS44MzA3OSA2Ljc4MDE2QzEuODQxNjMgNi42NTg1IDEuODUyNDYgNi41NDEgMS44NjQxMyA2LjQyNkMxLjkzNjI0IDUuNjg0MDggMi4yNjc2NCA0Ljk5MTM0IDIuODAwMDQgNC40Njk2MkMzLjMzMjQzIDMuOTQ3ODkgNC4wMzE3MyAzLjYzMDU4IDQuNzc0OTYgMy41NzM1TDUuNDU5MTMgMy41MjAxNkw2LjIwOTEzIDMuNDY5MzNMNy4wMTA3OSAzLjQyMTgzTDcuODQ3NDYgMy4zODE4M0M4LjU2NDU0IDMuMzUwNjkgOS4yODIyIDMuMzM0NTggOS45OTk5NiAzLjMzMzVaTTguMzMzMjkgNy45NzkzM1YxMi4wMjFDOC4zMzMyOSAxMi40MDYgOC43NDk5NiAxMi42NDYgOS4wODMyOSAxMi40NTQzTDEyLjU4MzMgMTAuNDMzNUMxMi42NTk1IDEwLjM4OTcgMTIuNzIyNyAxMC4zMjY1IDEyLjc2NjcgMTAuMjUwNEMxMi44MTA3IDEwLjE3NDQgMTIuODMzOCAxMC4wODggMTIuODMzOCAxMC4wMDAyQzEyLjgzMzggOS45MTIyOSAxMi44MTA3IDkuODI1OTYgMTIuNzY2NyA5Ljc0OTg4QzEyLjcyMjcgOS42NzM4MSAxMi42NTk1IDkuNjEwNjcgMTIuNTgzMyA5LjU2NjgzTDkuMDgzMjkgNy41NDY4M0M5LjAwNzI2IDcuNTAyOTMgOC45MjEwMSA3LjQ3OTgzIDguODMzMjEgNy40Nzk4NEM4Ljc0NTQyIDcuNDc5ODYgOC42NTkxNyA3LjUwMjk5IDguNTgzMTUgNy41NDY5MUM4LjUwNzEzIDcuNTkwODMgOC40NDQwMiA3LjY1NCA4LjQwMDE2IDcuNzMwMDVDOC4zNTYzIDcuODA2MSA4LjMzMzI0IDcuODkyMzcgOC4zMzMyOSA3Ljk4MDE2VjcuOTc5MzNaXCIgZmlsbD1cImN1cnJlbnRDb2xvclwiIC8+XHJcbiAgICA8L3N2Zz4sXHJcbiAgICBzdXBwb3J0OiAoKSA9PiA8c3ZnIHdpZHRoPVwiMjBcIiBoZWlnaHQ9XCIyMFwiIHZpZXdCb3g9XCIwIDAgMjAgMjBcIiBmaWxsPVwibm9uZVwiIHhtbG5zPVwiaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmdcIj5cclxuICAgICAgICA8cGF0aCBkPVwiTTguMzMzMzMgNi42Njg1M0M4LjQ4MDE2IDYuMjUxMTMgOC43Njk5OCA1Ljg5OTE3IDkuMTUxNDQgNS42NzQ5OEM5LjUzMjkxIDUuNDUwNzkgOS45ODE0MSA1LjM2ODg0IDEwLjQxNzUgNS40NDM2NEMxMC44NTM2IDUuNTE4NDQgMTEuMjQ5MiA1Ljc0NTE3IDExLjUzNDEgNi4wODM2N0MxMS44MTkxIDYuNDIyMTcgMTEuOTc1IDYuODUwNiAxMS45NzQ0IDcuMjkzMDZDMTEuOTc0NCA4LjU0MjEzIDEwLjEwMDggOS4xNjY2NyAxMC4xMDA4IDkuMTY2NjdNMTAuMTI0OSAxMS42NjY3SDEwLjEzMzNNNS44MzMzMyAxNVYxNi45NDYzQzUuODMzMzMgMTcuMzkwMyA1LjgzMzMzIDE3LjYxMjMgNS45MjQzNiAxNy43MjYzQzYuMDAzNTIgMTcuODI1NSA2LjEyMzU2IDE3Ljg4MzIgNi4yNTA0NSAxNy44ODMxQzYuMzk2MzYgMTcuODgyOSA2LjU2OTczIDE3Ljc0NDIgNi45MTY0NiAxNy40NjY4TDguOTA0MzQgMTUuODc2NUM5LjMxMDQzIDE1LjU1MTcgOS41MTM0NyAxNS4zODkyIDkuNzM5NTcgMTUuMjczN0M5Ljk0MDE3IDE1LjE3MTIgMTAuMTUzNyAxNS4wOTYzIDEwLjM3NDMgMTUuMDUxQzEwLjYyMzEgMTUgMTAuODgzMSAxNSAxMS40MDMxIDE1SDEzLjVDMTQuOTAwMSAxNSAxNS42MDAyIDE1IDE2LjEzNSAxNC43Mjc1QzE2LjYwNTQgMTQuNDg3OCAxNi45ODc4IDE0LjEwNTQgMTcuMjI3NSAxMy42MzVDMTcuNSAxMy4xMDAyIDE3LjUgMTIuNDAwMSAxNy41IDExVjYuNUMxNy41IDUuMDk5ODcgMTcuNSA0LjM5OTggMTcuMjI3NSAzLjg2NTAyQzE2Ljk4NzggMy4zOTQ2MiAxNi42MDU0IDMuMDEyMTcgMTYuMTM1IDIuNzcyNDhDMTUuNjAwMiAyLjUgMTQuOTAwMSAyLjUgMTMuNSAyLjVINi41QzUuMDk5ODcgMi41IDQuMzk5OCAyLjUgMy44NjUwMiAyLjc3MjQ4QzMuMzk0NjIgMy4wMTIxNyAzLjAxMjE3IDMuMzk0NjIgMi43NzI0OCAzLjg2NTAyQzIuNSA0LjM5OTggMi41IDUuMDk5ODcgMi41IDYuNVYxMS42NjY3QzIuNSAxMi40NDE2IDIuNSAxMi44MjkxIDIuNTg1MTkgMTMuMTQ3QzIuODE2MzUgMTQuMDA5OCAzLjQ5MDIyIDE0LjY4MzYgNC4zNTI5NSAxNC45MTQ4QzQuNjcwODcgMTUgNS4wNTgzNiAxNSA1LjgzMzMzIDE1WlwiIHN0cm9rZT1cImN1cnJlbnRDb2xvclwiIHN0cm9rZVdpZHRoPVwiMS42N1wiIHN0cm9rZUxpbmVjYXA9XCJyb3VuZFwiIHN0cm9rZUxpbmVqb2luPVwicm91bmRcIiAvPlxyXG4gICAgPC9zdmc+LFxyXG4gICAgZG9jOiAoKSA9PiA8c3ZnIHdpZHRoPVwiMjBcIiBoZWlnaHQ9XCIyMFwiIHZpZXdCb3g9XCIwIDAgMjAgMjBcIiBmaWxsPVwibm9uZVwiIHhtbG5zPVwiaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmdcIj5cclxuICAgICAgICA8cmVjdCB3aWR0aD1cIjIwXCIgaGVpZ2h0PVwiMjBcIiBmaWxsPVwibm9uZVwiIC8+XHJcbiAgICAgICAgPHBhdGggZD1cIk0zLjMzMzM3IDEuNjY2NUgxMC44MzM0TDE2LjY2NjcgNy40OTk4NFYxOC4zMzMySDMuMzMzMzdWMS42NjY1WlwiIHN0cm9rZT1cImN1cnJlbnRDb2xvclwiIHN0cm9rZVdpZHRoPVwiMS42N1wiIHN0cm9rZUxpbmVjYXA9XCJyb3VuZFwiIHN0cm9rZUxpbmVqb2luPVwicm91bmRcIiAvPlxyXG4gICAgICAgIDxwYXRoIGQ9XCJNMTAuODMzNCAxLjY2NjVWNy40OTk4NEgxNi42NjY3XCIgc3Ryb2tlPVwiY3VycmVudENvbG9yXCIgc3Ryb2tlV2lkdGg9XCIxLjY3XCIgc3Ryb2tlTGluZWNhcD1cInJvdW5kXCIgc3Ryb2tlTGluZWpvaW49XCJyb3VuZFwiIC8+XHJcbiAgICAgICAgPHBhdGggZD1cIk02LjY2NjYzIDExLjY2NjVIMTMuMzMzM1wiIHN0cm9rZT1cImN1cnJlbnRDb2xvclwiIHN0cm9rZVdpZHRoPVwiMS42N1wiIHN0cm9rZUxpbmVjYXA9XCJyb3VuZFwiIC8+XHJcbiAgICAgICAgPHBhdGggZD1cIk02LjY2NjYzIDE1SDkuOTk5OTZcIiBzdHJva2U9XCJjdXJyZW50Q29sb3JcIiBzdHJva2VXaWR0aD1cIjEuNjdcIiBzdHJva2VMaW5lY2FwPVwicm91bmRcIiAvPlxyXG4gICAgPC9zdmc+LFxyXG4gICAgbG9jazogKCkgPT4gPHN2ZyB3aWR0aD1cIjE3XCIgaGVpZ2h0PVwiMjFcIiB2aWV3Qm94PVwiMCAwIDE3IDIxXCIgZmlsbD1cIm5vbmVcIiB4bWxucz1cImh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnXCI+XHJcbiAgICAgICAgPHBhdGggZD1cIk0yLjgyNDU2IDIxQzIuMjkwNjEgMjEgMS44MzM1MiAyMC44MDQyIDEuNDUzMjkgMjAuNDEyNUMxLjA3MzA1IDIwLjAyMDggMC44ODI5MzUgMTkuNTUgMC44ODI5MzUgMTlWOUMwLjg4MjkzNSA4LjQ1IDEuMDczMDUgNy45NzkxNyAxLjQ1MzI5IDcuNTg3NUMxLjgzMzUyIDcuMTk1ODMgMi4yOTA2MSA3IDIuODI0NTYgN0gzLjc5NTM4VjVDMy43OTUzOCAzLjYxNjY3IDQuMjY4NjUgMi40Mzc1IDUuMjE1MTkgMS40NjI1QzYuMTYxNzQgMC40ODc1IDcuMzA2NDkgMCA4LjY0OTQ1IDBDOS45OTI0MSAwIDExLjEzNzIgMC40ODc1IDEyLjA4MzcgMS40NjI1QzEzLjAzMDIgMi40Mzc1IDEzLjUwMzUgMy42MTY2NyAxMy41MDM1IDVWN0gxNC40NzQzQzE1LjAwODMgNyAxNS40NjU0IDcuMTk1ODMgMTUuODQ1NiA3LjU4NzVDMTYuMjI1OCA3Ljk3OTE3IDE2LjQxNiA4LjQ1IDE2LjQxNiA5VjE5QzE2LjQxNiAxOS41NSAxNi4yMjU4IDIwLjAyMDggMTUuODQ1NiAyMC40MTI1QzE1LjQ2NTQgMjAuODA0MiAxNS4wMDgzIDIxIDE0LjQ3NDMgMjFIMi44MjQ1NlpNMi44MjQ1NiAxOUgxNC40NzQzVjlIMi44MjQ1NlYxOVpNOC42NDk0NSAxNkM5LjE4MzQgMTYgOS42NDA0OSAxNS44MDQyIDEwLjAyMDcgMTUuNDEyNUMxMC40MDEgMTUuMDIwOCAxMC41OTExIDE0LjU1IDEwLjU5MTEgMTRDMTAuNTkxMSAxMy40NSAxMC40MDEgMTIuOTc5MiAxMC4wMjA3IDEyLjU4NzVDOS42NDA0OSAxMi4xOTU4IDkuMTgzNCAxMiA4LjY0OTQ1IDEyQzguMTE1NSAxMiA3LjY1ODQxIDEyLjE5NTggNy4yNzgxNyAxMi41ODc1QzYuODk3OTQgMTIuOTc5MiA2LjcwNzgyIDEzLjQ1IDYuNzA3ODIgMTRDNi43MDc4MiAxNC41NSA2Ljg5Nzk0IDE1LjAyMDggNy4yNzgxNyAxNS40MTI1QzcuNjU4NDEgMTUuODA0MiA4LjExNTUgMTYgOC42NDk0NSAxNlpNNS43MzcwMSA3SDExLjU2MTlWNUMxMS41NjE5IDQuMTY2NjcgMTEuMjc4NyAzLjQ1ODMzIDEwLjcxMjQgMi44NzVDMTAuMTQ2MSAyLjI5MTY3IDkuNDU4NDYgMiA4LjY0OTQ1IDJDNy44NDA0NCAyIDcuMTUyNzggMi4yOTE2NyA2LjU4NjQ3IDIuODc1QzYuMDIwMTYgMy40NTgzMyA1LjczNzAxIDQuMTY2NjcgNS43MzcwMSA1VjdaXCIgZmlsbD1cIiNEOUQ5RDlcIiAvPlxyXG4gICAgPC9zdmc+LFxyXG4gICAgZG9jdW1lbnRhdGlvbjogKCkgPT4gPHN2ZyB3aWR0aD1cIjE2XCIgaGVpZ2h0PVwiMjBcIiB2aWV3Qm94PVwiMCAwIDE2IDIwXCIgZmlsbD1cIm5vbmVcIiB4bWxucz1cImh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnXCI+XHJcbiAgICAgICAgPHBhdGggZD1cIk05LjY2NjcxIDkuMTY2NUg0LjY2NjcxTTYuMzMzMzcgMTIuNDk5OEg0LjY2NjcxTTExLjMzMzQgNS44MzMxN0g0LjY2NjcxTTE0LjY2NjcgNS42NjY1VjE0LjMzMzJDMTQuNjY2NyAxNS43MzMzIDE0LjY2NjcgMTYuNDMzNCAxNC4zOTQyIDE2Ljk2ODFDMTQuMTU0NSAxNy40Mzg1IDEzLjc3MjEgMTcuODIxIDEzLjMwMTcgMTguMDYwN0MxMi43NjY5IDE4LjMzMzIgMTIuMDY2OCAxOC4zMzMyIDEwLjY2NjcgMTguMzMzMkg1LjMzMzM3QzMuOTMzMjQgMTguMzMzMiAzLjIzMzE4IDE4LjMzMzIgMi42OTg0IDE4LjA2MDdDMi4yMjc5OSAxNy44MjEgMS44NDU1NCAxNy40Mzg1IDEuNjA1ODYgMTYuOTY4MUMxLjMzMzM3IDE2LjQzMzQgMS4zMzMzNyAxNS43MzMzIDEuMzMzMzcgMTQuMzMzMlY1LjY2NjVDMS4zMzMzNyA0LjI2NjM3IDEuMzMzMzcgMy41NjYzMSAxLjYwNTg2IDMuMDMxNTNDMS44NDU1NCAyLjU2MTEyIDIuMjI3OTkgMi4xNzg2NyAyLjY5ODQgMS45Mzg5OUMzLjIzMzE4IDEuNjY2NSAzLjkzMzI0IDEuNjY2NSA1LjMzMzM3IDEuNjY2NUgxMC42NjY3QzEyLjA2NjggMS42NjY1IDEyLjc2NjkgMS42NjY1IDEzLjMwMTcgMS45Mzg5OUMxMy43NzIxIDIuMTc4NjcgMTQuMTU0NSAyLjU2MTEyIDE0LjM5NDIgMy4wMzE1M0MxNC42NjY3IDMuNTY2MzEgMTQuNjY2NyA0LjI2NjM3IDE0LjY2NjcgNS42NjY1WlwiIHN0cm9rZT1cImN1cnJlbnRDb2xvclwiIHN0cm9rZVdpZHRoPVwiMS42N1wiIHN0cm9rZUxpbmVjYXA9XCJyb3VuZFwiIHN0cm9rZUxpbmVqb2luPVwicm91bmRcIiAvPlxyXG4gICAgPC9zdmc+LFxyXG4gICAgc3VwcG9ydFR3bzogKCkgPT4gPHN2ZyB3aWR0aD1cIjE4XCIgaGVpZ2h0PVwiMTRcIiB2aWV3Qm94PVwiMCAwIDE4IDE0XCIgZmlsbD1cIm5vbmVcIiB4bWxucz1cImh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnXCI+XHJcbiAgICAgICAgPHBhdGggZD1cIk04Ljk5OTk2IDExLjE2NjhDOS4yMzYwNyAxMS4xNjY4IDkuNDMzOTkgMTEuMDg3IDkuNTkzNzEgMTAuOTI3MkM5Ljc1MzQzIDEwLjc2NzUgOS44MzMyOSAxMC41Njk2IDkuODMzMjkgMTAuMzMzNUM5LjgzMzI5IDEwLjA5NzQgOS43NTM0MyA5Ljg5OTQ3IDkuNTkzNzEgOS43Mzk3NUM5LjQzMzk5IDkuNTgwMDIgOS4yMzYwNyA5LjUwMDE2IDguOTk5OTYgOS41MDAxNkM4Ljc2Mzg1IDkuNTAwMTYgOC41NjU5MyA5LjU4MDAyIDguNDA2MjEgOS43Mzk3NUM4LjI0NjQ5IDkuODk5NDcgOC4xNjY2MiAxMC4wOTc0IDguMTY2NjIgMTAuMzMzNUM4LjE2NjYyIDEwLjU2OTYgOC4yNDY0OSAxMC43Njc1IDguNDA2MjEgMTAuOTI3MkM4LjU2NTkzIDExLjA4NyA4Ljc2Mzg1IDExLjE2NjggOC45OTk5NiAxMS4xNjY4Wk04Ljk5OTk2IDcuODMzNUM5LjIzNjA3IDcuODMzNSA5LjQzMzk5IDcuNzUzNjMgOS41OTM3MSA3LjU5MzkxQzkuNzUzNDMgNy40MzQxOSA5LjgzMzI5IDcuMjM2MjcgOS44MzMyOSA3LjAwMDE2QzkuODMzMjkgNi43NjQwNSA5Ljc1MzQzIDYuNTY2MTMgOS41OTM3MSA2LjQwNjQxQzkuNDMzOTkgNi4yNDY2OSA5LjIzNjA3IDYuMTY2ODMgOC45OTk5NiA2LjE2NjgzQzguNzYzODUgNi4xNjY4MyA4LjU2NTkzIDYuMjQ2NjkgOC40MDYyMSA2LjQwNjQxQzguMjQ2NDkgNi41NjYxMyA4LjE2NjYyIDYuNzY0MDUgOC4xNjY2MiA3LjAwMDE2QzguMTY2NjIgNy4yMzYyNyA4LjI0NjQ5IDcuNDM0MTkgOC40MDYyMSA3LjU5MzkxQzguNTY1OTMgNy43NTM2MyA4Ljc2Mzg1IDcuODMzNSA4Ljk5OTk2IDcuODMzNVpNOC45OTk5NiA0LjUwMDE2QzkuMjM2MDcgNC41MDAxNiA5LjQzMzk5IDQuNDIwMyA5LjU5MzcxIDQuMjYwNThDOS43NTM0MyA0LjEwMDg2IDkuODMzMjkgMy45MDI5NCA5LjgzMzI5IDMuNjY2ODNDOS44MzMyOSAzLjQzMDcyIDkuNzUzNDMgMy4yMzI4IDkuNTkzNzEgMy4wNzMwOEM5LjQzMzk5IDIuOTEzMzYgOS4yMzYwNyAyLjgzMzUgOC45OTk5NiAyLjgzMzVDOC43NjM4NSAyLjgzMzUgOC41NjU5MyAyLjkxMzM2IDguNDA2MjEgMy4wNzMwOEM4LjI0NjQ5IDMuMjMyOCA4LjE2NjYyIDMuNDMwNzIgOC4xNjY2MiAzLjY2NjgzQzguMTY2NjIgMy45MDI5NCA4LjI0NjQ5IDQuMTAwODYgOC40MDYyMSA0LjI2MDU4QzguNTY1OTMgNC40MjAzIDguNzYzODUgNC41MDAxNiA4Ljk5OTk2IDQuNTAwMTZaTTE1LjY2NjYgMTMuNjY2OEgyLjMzMzI5QzEuODc0OTYgMTMuNjY2OCAxLjQ4MjYgMTMuNTAzNiAxLjE1NjIxIDEzLjE3NzJDMC44Mjk4MiAxMi44NTA5IDAuNjY2NjI2IDEyLjQ1ODUgMC42NjY2MjYgMTIuMDAwMlY4LjY2NjgzQzEuMTI0OTYgOC42NjY4MyAxLjUxNzMyIDguNTAzNjMgMS44NDM3MSA4LjE3NzI1QzIuMTcwMSA3Ljg1MDg2IDIuMzMzMjkgNy40NTg1IDIuMzMzMjkgNy4wMDAxNkMyLjMzMzI5IDYuNTQxODMgMi4xNzAxIDYuMTQ5NDcgMS44NDM3MSA1LjgyMzA4QzEuNTE3MzIgNS40OTY2OSAxLjEyNDk2IDUuMzMzNSAwLjY2NjYyNiA1LjMzMzVWMi4wMDAxNkMwLjY2NjYyNiAxLjU0MTgzIDAuODI5ODIgMS4xNDk0NyAxLjE1NjIxIDAuODIzMDc5QzEuNDgyNiAwLjQ5NjY5MSAxLjg3NDk2IDAuMzMzNDk2IDIuMzMzMjkgMC4zMzM0OTZIMTUuNjY2NkMxNi4xMjUgMC4zMzM0OTYgMTYuNTE3MyAwLjQ5NjY5MSAxNi44NDM3IDAuODIzMDc5QzE3LjE3MDEgMS4xNDk0NyAxNy4zMzMzIDEuNTQxODMgMTcuMzMzMyAyLjAwMDE2VjUuMzMzNUMxNi44NzUgNS4zMzM1IDE2LjQ4MjYgNS40OTY2OSAxNi4xNTYyIDUuODIzMDhDMTUuODI5OCA2LjE0OTQ3IDE1LjY2NjYgNi41NDE4MyAxNS42NjY2IDcuMDAwMTZDMTUuNjY2NiA3LjQ1ODUgMTUuODI5OCA3Ljg1MDg2IDE2LjE1NjIgOC4xNzcyNUMxNi40ODI2IDguNTAzNjMgMTYuODc1IDguNjY2ODMgMTcuMzMzMyA4LjY2NjgzVjEyLjAwMDJDMTcuMzMzMyAxMi40NTg1IDE3LjE3MDEgMTIuODUwOSAxNi44NDM3IDEzLjE3NzJDMTYuNTE3MyAxMy41MDM2IDE2LjEyNSAxMy42NjY4IDE1LjY2NjYgMTMuNjY2OFpNMTUuNjY2NiAxMi4wMDAyVjkuODc1MTZDMTUuMTUyNyA5LjU2OTYxIDE0Ljc0NjUgOS4xNjMzNiAxNC40NDc5IDguNjU2NDFDMTQuMTQ5MyA4LjE0OTQ3IDE0IDcuNTk3MzggMTQgNy4wMDAxNkMxNCA2LjQwMjk0IDE0LjE0OTMgNS44NTA4NiAxNC40NDc5IDUuMzQzOTFDMTQuNzQ2NSA0LjgzNjk3IDE1LjE1MjcgNC40MzA3MiAxNS42NjY2IDQuMTI1MTZWMi4wMDAxNkgyLjMzMzI5VjQuMTI1MTZDMi44NDcxOCA0LjQzMDcyIDMuMjUzNDMgNC44MzY5NyAzLjU1MjA0IDUuMzQzOTFDMy44NTA2NSA1Ljg1MDg2IDMuOTk5OTYgNi40MDI5NCAzLjk5OTk2IDcuMDAwMTZDMy45OTk5NiA3LjU5NzM4IDMuODUwNjUgOC4xNDk0NyAzLjU1MjA0IDguNjU2NDFDMy4yNTM0MyA5LjE2MzM2IDIuODQ3MTggOS41Njk2MSAyLjMzMzI5IDkuODc1MTZWMTIuMDAwMkgxNS42NjY2WlwiIGZpbGw9XCIjRjg0NzhEXCIgLz5cclxuICAgIDwvc3ZnPixcclxuICAgIHZpZGVvOiAoKSA9PiA8c3ZnIHdpZHRoPVwiMjJcIiBoZWlnaHQ9XCIyMlwiIHZpZXdCb3g9XCIwIDAgMjIgMjJcIiBmaWxsPVwibm9uZVwiIHhtbG5zPVwiaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmdcIj5cclxuICAgICAgICA8cGF0aCBkPVwiTTExIDIxQzE2LjUyMjggMjEgMjEgMTYuNTIyOCAyMSAxMUMyMSA1LjQ3NzE1IDE2LjUyMjggMSAxMSAxQzUuNDc3MTUgMSAxIDUuNDc3MTUgMSAxMUMxIDE2LjUyMjggNS40NzcxNSAyMSAxMSAyMVpcIiBzdHJva2U9XCIjRjg0NzhEXCIgc3Ryb2tlV2lkdGg9XCIyXCIgc3Ryb2tlTGluZWNhcD1cInJvdW5kXCIgc3Ryb2tlTGluZWpvaW49XCJyb3VuZFwiIC8+XHJcbiAgICAgICAgPHBhdGggZD1cIk04LjUgNy45NjUzM0M4LjUgNy40ODgwNSA4LjUgNy4yNDk0MSA4LjU5OTc0IDcuMTE2MThDOC42ODY2NiA3LjAwMDA3IDguODE5NzEgNi45Mjc0NCA4Ljk2NDM4IDYuOTE3MUM5LjEzMDM4IDYuOTA1MjUgOS4zMzExMiA3LjAzNDI5IDkuNzMyNjEgNy4yOTIzOUwxNC40NTMyIDEwLjMyNzFDMTQuODAxNiAxMC41NTEgMTQuOTc1OCAxMC42NjMgMTUuMDM1OSAxMC44MDU0QzE1LjA4ODUgMTAuOTI5OCAxNS4wODg1IDExLjA3MDIgMTUuMDM1OSAxMS4xOTQ2QzE0Ljk3NTggMTEuMzM3IDE0LjgwMTYgMTEuNDQ5IDE0LjQ1MzIgMTEuNjcyOUw5LjczMjYxIDE0LjcwNzZDOS4zMzExMiAxNC45NjU3IDkuMTMwMzggMTUuMDk0OCA4Ljk2NDM4IDE1LjA4MjlDOC44MTk3MSAxNS4wNzI2IDguNjg2NjYgMTQuOTk5OSA4LjU5OTc0IDE0Ljg4MzhDOC41IDE0Ljc1MDYgOC41IDE0LjUxMiA4LjUgMTQuMDM0N1Y3Ljk2NTMzWlwiIHN0cm9rZT1cIiNGODQ3OERcIiBzdHJva2VXaWR0aD1cIjJcIiBzdHJva2VMaW5lY2FwPVwicm91bmRcIiBzdHJva2VMaW5lam9pbj1cInJvdW5kXCIgLz5cclxuICAgIDwvc3ZnPixcclxuICAgIGFycm93dHdvOiAoKSA9PiA8c3ZnIHdpZHRoPVwiOFwiIGhlaWdodD1cIjEyXCIgdmlld0JveD1cIjAgMCA4IDEyXCIgZmlsbD1cIm5vbmVcIiB4bWxucz1cImh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnXCI+XHJcbiAgICAgICAgPHBhdGggZD1cIk0xLjUgMTFMNi41IDZMMS41IDFcIiBzdHJva2U9XCJjdXJyZW50Q29sb3JcIiBzdHJva2VXaWR0aD1cIjEuNjdcIiBzdHJva2VMaW5lY2FwPVwicm91bmRcIiBzdHJva2VMaW5lam9pbj1cInJvdW5kXCIgLz5cclxuICAgIDwvc3ZnPixcclxuICAgIHByb0xvZ286ICgpID0+IDxzdmcgd2lkdGg9XCIzNlwiIGhlaWdodD1cIjMyXCIgdmlld0JveD1cIjAgMCAzNiAzMlwiIGZpbGw9XCJub25lXCIgeG1sbnM9XCJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2Z1wiIHhsaW5rPVwiaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGlua1wiPlxyXG4gICAgICAgIDxyZWN0IHdpZHRoPVwiMzZcIiBoZWlnaHQ9XCIzMlwiIGZpbGw9XCJ1cmwoI3BhdHRlcm4wXzI0MTRfMTMyOSlcIiAvPlxyXG4gICAgICAgIDxkZWZzPlxyXG4gICAgICAgICAgICA8cGF0dGVybiBpZD1cInBhdHRlcm4wXzI0MTRfMTMyOVwiIHBhdHRlcm5Db250ZW50VW5pdHM9XCJvYmplY3RCb3VuZGluZ0JveFwiIHdpZHRoPVwiMVwiIGhlaWdodD1cIjFcIj5cclxuICAgICAgICAgICAgICAgIDx1c2UgaHJlZj1cIiNpbWFnZTBfMjQxNF8xMzI5XCIgdHJhbnNmb3JtPVwibWF0cml4KDAuMDE0ODE0OCAwIDAgMC4wMTY2NjY3IC0wLjAwMzcwMzcgMClcIiAvPlxyXG4gICAgICAgICAgICA8L3BhdHRlcm4+XHJcbiAgICAgICAgICAgIDxpbWFnZSBpZD1cImltYWdlMF8yNDE0XzEzMjlcIiB3aWR0aD1cIjY4XCIgaGVpZ2h0PVwiNjBcIiBocmVmPVwiZGF0YTppbWFnZS9wbmc7YmFzZTY0LGlWQk9SdzBLR2dvQUFBQU5TVWhFVWdBQUFFUUFBQUE4Q0FNQUFBRG92T3dzQUFBQVYxQk1WRVhPYzVyYlk1SGxWNHJvVTRmb1U0Zm9VNGZvVTRmb1U0Zm9VNGZvVTRmYlQ0VzBUSHVjUzNXTVZIaUVUbmVLWTRhRGphS0d0YitJemMrSXp0Q0l6dENJenRDSXp0Q0l6dEIvWllaOFEyNlVSM1RLVDREblU0Zmd1OHdEQUFBQUYzUlNUbE1BRUNGRmVKS3Z4OTd3L1AzOTlmejQvdjd6NkQ2R3d1eHBxd2tBQUFGaVNVUkJWRmpEdFplQmVvSXdESVNwSWxCd0RoQ3N4YjcvYzA1cHhpcU1RdFB6SHVEL2trc291U1Q1VjZMcis5dTFWYXFwdjcrcWh6R3l5TFAwS0pMZEV2MU52ZFRVZDAwYXF0SzhsS2Y3T0owbHFHWWlXSjBmSThaa1J6WmlMSWN3dVI4alBJaXhtcEtxOFRUVnRjUzQ2RFZSTVhLMW1ONGlWSzA5cWl6Rm5MeXRxTHYyYWlCS0x2aU1KNlZjbyt4bmVHb0pZRGdVaHFjYjduWmhqR25TeHBtMDJONlB1Y2hjZWVBWlFydExwV1R6WmhvZG9IbERqRUlXRTJJVk1pK0ZWY2pNRlVFTXBRTkZFQ1BDOTJ5NWNTbS9temRyMmQyNC9UQm44ejRmdGlXdUtXeEwzQ0ZIUVA2Y3ZSTGtvdG5PRmtuTEhzNEVrWW1LaHhnTXBJMzNSTVlZTzB6R1FrWU1XVGJJMmtNK1FNaFRBSG1VTU04ajVLR0cvREl3UHkvSWJ4VHpRNGVjRnBnakIzSnVZUTQvekFtS09ZWTNVOHJ5TEMvRVp3SUNKcW80b2FtT0NFMDc0dHZ2bmg0K0hTUkJrWGJFeElkckorWS9jNzZOK2FVLzV2OEFZKzgvek1zbkVVd0FBQUFBU1VWT1JLNUNZSUk9XCIgLz5cclxuICAgICAgICA8L2RlZnM+XHJcbiAgICA8L3N2Zz4sXHJcbiAgICBwcmV2aWV3OiAoKSA9PiA8c3ZnIHdpZHRoPVwiMjBcIiBoZWlnaHQ9XCIxNFwiIHZpZXdCb3g9XCIwIDAgMjAgMTRcIiBmaWxsPVwibm9uZVwiIHhtbG5zPVwiaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmdcIj5cclxuICAgICAgICA8cGF0aCBkPVwiTTIuMDE2NzcgNy41OTQxNUMxLjkwMzI4IDcuNDE0NDUgMS44NDY1NCA3LjMyNDYgMS44MTQ3NyA3LjE4NjAyQzEuNzkwOTEgNy4wODE5MiAxLjc5MDkxIDYuOTE3NzUgMS44MTQ3NyA2LjgxMzY2QzEuODQ2NTQgNi42NzUwNyAxLjkwMzI4IDYuNTg1MjIgMi4wMTY3NyA2LjQwNTUyQzIuOTU0NjEgNC45MjA1NCA1Ljc0NjE3IDEuMTY2NSAxMC4wMDAzIDEuMTY2NUMxNC4yNTQ1IDEuMTY2NSAxNy4wNDYxIDQuOTIwNTQgMTcuOTgzOSA2LjQwNTUyQzE4LjA5NzQgNi41ODUyMiAxOC4xNTQxIDYuNjc1MDcgMTguMTg1OSA2LjgxMzY2QzE4LjIwOTggNi45MTc3NSAxOC4yMDk4IDcuMDgxOTIgMTguMTg1OSA3LjE4NjAyQzE4LjE1NDEgNy4zMjQ2IDE4LjA5NzQgNy40MTQ0NSAxNy45ODM5IDcuNTk0MTVDMTcuMDQ2MSA5LjA3OTE0IDE0LjI1NDUgMTIuODMzMiAxMC4wMDAzIDEyLjgzMzJDNS43NDYxNyAxMi44MzMyIDIuOTU0NjEgOS4wNzkxNCAyLjAxNjc3IDcuNTk0MTVaXCIgc3Ryb2tlPVwiI0Y4NDc4RFwiIHN0cm9rZVdpZHRoPVwiMS42N1wiIHN0cm9rZUxpbmVjYXA9XCJyb3VuZFwiIHN0cm9rZUxpbmVqb2luPVwicm91bmRcIiAvPlxyXG4gICAgICAgIDxwYXRoIGQ9XCJNMTAuMDAwMyA5LjQ5OTg0QzExLjM4MSA5LjQ5OTg0IDEyLjUwMDMgOC4zODA1NSAxMi41MDAzIDYuOTk5ODRDMTIuNTAwMyA1LjYxOTEzIDExLjM4MSA0LjQ5OTg0IDEwLjAwMDMgNC40OTk4NEM4LjYxOTYyIDQuNDk5ODQgNy41MDAzNCA1LjYxOTEzIDcuNTAwMzQgNi45OTk4NEM3LjUwMDM0IDguMzgwNTUgOC42MTk2MiA5LjQ5OTg0IDEwLjAwMDMgOS40OTk4NFpcIiBzdHJva2U9XCIjRjg0NzhEXCIgc3Ryb2tlV2lkdGg9XCIxLjY3XCIgc3Ryb2tlTGluZWNhcD1cInJvdW5kXCIgc3Ryb2tlTGluZWpvaW49XCJyb3VuZFwiIC8+XHJcbiAgICA8L3N2Zz4sXHJcbiAgICBoaWRlUGFzc293cmQ6ICgpID0+IDxzdmcgd2lkdGg9XCIyMFwiIGhlaWdodD1cIjIwXCIgdmlld0JveD1cIjAgMCAyMCAyMFwiIGZpbGw9XCJub25lXCIgeG1sbnM9XCJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2Z1wiPlxyXG4gICAgICAgIDxwYXRoIGQ9XCJNOC45NTI0NSA0LjI0MzZDOS4yOTExMyA0LjE5MzUzIDkuNjQwNTEgNC4xNjY2NyAxMC4wMDAzIDQuMTY2NjdDMTQuMjU0NSA0LjE2NjY3IDE3LjA0NjEgNy45MjA3IDE3Ljk4MzkgOS40MDU2OUMxOC4wOTc0IDkuNTg1NDIgMTguMTU0MiA5LjY3NTI4IDE4LjE4NTkgOS44MTM4OUMxOC4yMDk4IDkuOTE3OTkgMTguMjA5OCAxMC4wODIyIDE4LjE4NTkgMTAuMTg2M0MxOC4xNTQxIDEwLjMyNDkgMTguMDk3IDEwLjQxNTQgMTcuOTgyNyAxMC41OTYzQzE3LjczMjggMTAuOTkxOCAxNy4zNTE4IDExLjU0NzYgMTYuODQ3MSAxMi4xNTA0TTUuNjAzNiA1LjU5NTg2QzMuODAxODcgNi44MTgwOCAyLjU3ODcxIDguNTE2MTUgMi4wMTc1OSA5LjQwNDRDMS45MDM1NyA5LjU4NDg5IDEuODQ2NTYgOS42NzUxNCAxLjgxNDc4IDkuODEzNzNDMS43OTA5MSA5LjkxNzgzIDEuNzkwOSAxMC4wODIgMS44MTQ3NiAxMC4xODYxQzEuODQ2NTIgMTAuMzI0NyAxLjkwMzI4IDEwLjQxNDYgMi4wMTY3OCAxMC41OTQzQzIuOTU0NjIgMTIuMDc5MyA1Ljc0NjE4IDE1LjgzMzMgMTAuMDAwMyAxNS44MzMzQzExLjcxNTcgMTUuODMzMyAxMy4xOTMyIDE1LjIyMyAxNC40MDc0IDE0LjM5NzJNMi41MDAzNSAyLjVMMTcuNTAwMyAxNy41TTguMjMyNTggOC4yMzIyM0M3Ljc4MDE3IDguNjg0NjQgNy41MDAzNSA5LjMwOTY0IDcuNTAwMzUgMTBDNy41MDAzNSAxMS4zODA3IDguNjE5NjQgMTIuNSAxMC4wMDAzIDEyLjVDMTAuNjkwNyAxMi41IDExLjMxNTcgMTIuMjIwMiAxMS43NjgxIDExLjc2NzhcIiBzdHJva2U9XCIjNUE1RjYxXCIgc3Ryb2tlV2lkdGg9XCIxLjY3XCIgc3Ryb2tlTGluZWNhcD1cInJvdW5kXCIgc3Ryb2tlTGluZWpvaW49XCJyb3VuZFwiIC8+XHJcbiAgICA8L3N2Zz4sXHJcbiAgICBtaW51czogKCkgPT4gPHN2ZyB3aWR0aD1cIjI0XCIgaGVpZ2h0PVwiMjRcIiB2aWV3Qm94PVwiMCAwIDI0IDI0XCIgZmlsbD1cIm5vbmVcIiB4bWxucz1cImh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnXCI+XHJcbiAgICAgICAgPHBhdGggZD1cIk04IDEySDE2TTIyIDEyQzIyIDE3LjUyMjggMTcuNTIyOCAyMiAxMiAyMkM2LjQ3NzE1IDIyIDIgMTcuNTIyOCAyIDEyQzIgNi40NzcxNSA2LjQ3NzE1IDIgMTIgMkMxNy41MjI4IDIgMjIgNi40NzcxNSAyMiAxMlpcIiBzdHJva2U9XCIjOThBMkIzXCIgc3Ryb2tlV2lkdGg9XCIyXCIgc3Ryb2tlTGluZWNhcD1cInJvdW5kXCIgc3Ryb2tlTGluZWpvaW49XCJyb3VuZFwiIC8+XHJcbiAgICA8L3N2Zz4sXHJcbiAgICBwbHVzOiAoKSA9PiA8c3ZnIHdpZHRoPVwiMjRcIiBoZWlnaHQ9XCIyNFwiIHZpZXdCb3g9XCIwIDAgMjQgMjRcIiBmaWxsPVwibm9uZVwiIHhtbG5zPVwiaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmdcIj5cclxuICAgICAgICA8cGF0aCBkPVwiTTEyIDhWMTZNOCAxMkgxNk0yMiAxMkMyMiAxNy41MjI4IDE3LjUyMjggMjIgMTIgMjJDNi40NzcxNSAyMiAyIDE3LjUyMjggMiAxMkMyIDYuNDc3MTUgNi40NzcxNSAyIDEyIDJDMTcuNTIyOCAyIDIyIDYuNDc3MTUgMjIgMTJaXCIgc3Ryb2tlPVwiIzk4QTJCM1wiIHN0cm9rZVdpZHRoPVwiMlwiIHN0cm9rZUxpbmVjYXA9XCJyb3VuZFwiIHN0cm9rZUxpbmVqb2luPVwicm91bmRcIiAvPlxyXG4gICAgPC9zdmc+LFxyXG4gICAgcGx1Z2luTGlzdDogKCkgPT4gPHN2ZyB3aWR0aD1cIjQ4XCIgaGVpZ2h0PVwiNDhcIiB2aWV3Qm94PVwiMCAwIDQ4IDQ4XCIgZmlsbD1cIm5vbmVcIiB4bWxucz1cImh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnXCI+XHJcbiAgICAgICAgPHBhdGggZD1cIk0xMC42NzE1IDQxLjYxNUMxMS4wMjg4IDQxLjIyMzEgMTEuMjE1OCA0MC43MDUzIDExLjE5MTQgNDAuMTc1NkMxMS4xNjcxIDM5LjY0NTggMTAuOTMzMyAzOS4xNDc0IDEwLjU0MTUgMzguNzlDNy4xNTM0MiAzNS43MDU5IDQuOTI2OTMgMzEuNTUyMSA0LjIzNDM3IDI3LjAyMzJDMy41NDE4MiAyMi40OTQzIDQuNDI1MTkgMTcuODY0OSA2LjczNjc1IDEzLjkwOTJDOS4wNDgzMSA5Ljk1MzU0IDEyLjY0NzkgNi45MTE0MyAxNi45MzM2IDUuMjkxNjNDMjEuMjE5MiAzLjY3MTgyIDI1LjkzMTEgMy41NzI1NCAzMC4yODEyIDUuMDEwMzdDMzQuNjMxMyA2LjQ0ODIxIDM4LjM1NTggOS4zMzU5OSA0MC44MzIgMTMuMTkwOEM0My4zMDgxIDE3LjA0NTYgNDQuMzg1NyAyMS42MzM2IDQzLjg4NDUgMjYuMTg3N0M0My4zODM0IDMwLjc0MTcgNDEuMzMzOCAzNC45ODU3IDM4LjA3ODcgMzguMjA5N0MzNC44MjM1IDQxLjQzMzggMzAuNTYwMSA0My40NDI2IDI2LjAwMTUgNDMuOVYzNS45NkMyOC41NzY4IDM1Ljg1NjkgMzEuMDEyOSAzNC43NjM1IDMyLjgwMTUgMzIuOTA3OEMzNC41OTAyIDMxLjA1MiAzNS41OTMyIDI4LjU3NzQgMzUuNjAxNSAyNlYyMkMzNS42MDE1IDIxLjQ2OTYgMzUuMzkwOCAyMC45NjA5IDM1LjAxNTcgMjAuNTg1OEMzNC42NDA2IDIwLjIxMDcgMzQuMTMxOSAyMCAzMy42MDE1IDIwSDMwLjAwMTVWMTRDMzAuMDAxNSAxMy40Njk2IDI5Ljc5MDggMTIuOTYwOSAyOS40MTU3IDEyLjU4NThDMjkuMDQwNiAxMi4yMTA3IDI4LjUzMTkgMTIgMjguMDAxNSAxMkMyNy40NzExIDEyIDI2Ljk2MjMgMTIuMjEwNyAyNi41ODczIDEyLjU4NThDMjYuMjEyMiAxMi45NjA5IDI2LjAwMTUgMTMuNDY5NiAyNi4wMDE1IDE0VjIwSDIyLjAwMTVWMTRDMjIuMDAxNSAxMy40Njk2IDIxLjc5MDggMTIuOTYwOSAyMS40MTU3IDEyLjU4NThDMjEuMDQwNiAxMi4yMTA3IDIwLjUzMTkgMTIgMjAuMDAxNSAxMkMxOS40NzExIDEyIDE4Ljk2MjMgMTIuMjEwNyAxOC41ODczIDEyLjU4NThDMTguMjEyMiAxMi45NjA5IDE4LjAwMTUgMTMuNDY5NiAxOC4wMDE1IDE0VjIwSDE0LjQwMTVDMTMuODcxMSAyMCAxMy4zNjIzIDIwLjIxMDcgMTIuOTg3MyAyMC41ODU4QzEyLjYxMjIgMjAuOTYwOSAxMi40MDE1IDIxLjQ2OTYgMTIuNDAxNSAyMlYyNkMxMi40MDk3IDI4LjU3NzQgMTMuNDEyOCAzMS4wNTIgMTUuMjAxNCAzMi45MDc4QzE2Ljk5MDEgMzQuNzYzNSAxOS40MjYyIDM1Ljg1NjkgMjIuMDAxNSAzNS45NlY0NkMyMi4wMDE1IDQ2LjUzMDQgMjIuMjEyMiA0Ny4wMzkxIDIyLjU4NzMgNDcuNDE0MkMyMi45NjIzIDQ3Ljc4OTMgMjMuNDcxMSA0OCAyNC4wMDE1IDQ4QzI5LjYwMjQgNDcuOTk5NyAzNS4wMjY5IDQ2LjA0MDQgMzkuMzM1MyA0Mi40NjE2QzQzLjY0MzcgMzguODgyNyA0Ni41NjQ4IDMzLjkwOTcgNDcuNTkyNSAyOC40MDM5QzQ4LjYyMDMgMjIuODk4MSA0Ny42OSAxNy4yMDYxIDQ0Ljk2MjggMTIuMzE0QzQyLjIzNTYgNy40MjE4NiAzNy44ODMzIDMuNjM3NjIgMzIuNjU5NiAxLjYxNjcxQzI3LjQzNiAtMC40MDQxOTkgMjEuNjcgLTAuNTM0NDk2IDE2LjM2MDQgMS4yNDgzOUMxMS4wNTA4IDMuMDMxMjcgNi41MzE5NyA2LjYxNTA0IDMuNTg2NTcgMTEuMzc5QzAuNjQxMTY5IDE2LjE0MjkgLTAuNTQ1Mjg0IDIxLjc4NyAwLjIzMjcwNCAyNy4zMzM3QzEuMDEwNjkgMzIuODgwMyAzLjcwNDEyIDM3Ljk4MDIgNy44NDY0OSA0MS43NUM4LjIzOTAzIDQyLjEwNjcgOC43NTcxNyA0Mi4yOTI4IDkuMjg2OTQgNDIuMjY3NUM5LjgxNjcyIDQyLjI0MjIgMTAuMzE0OCA0Mi4wMDc1IDEwLjY3MTUgNDEuNjE1Wk0xNi40MDE1IDI2VjI0SDMxLjYwMTVWMjZDMzEuNjAxNSAyNy41OTEzIDMwLjk2OTMgMjkuMTE3NCAyOS44NDQxIDMwLjI0MjZDMjguNzE4OSAzMS4zNjc5IDI3LjE5MjggMzIgMjUuNjAxNSAzMkgyMi40MDE1QzIwLjgxMDIgMzIgMTkuMjg0MSAzMS4zNjc5IDE4LjE1ODggMzAuMjQyNkMxNy4wMzM2IDI5LjExNzQgMTYuNDAxNSAyNy41OTEzIDE2LjQwMTUgMjZaXCIgZmlsbD1cIiNGODQ3OERcIiAvPlxyXG4gICAgPC9zdmc+LFxyXG4gICAgc2lkZWJhcjogKCkgPT4gPHN2ZyB3aWR0aD1cIjMzXCIgaGVpZ2h0PVwiMzJcIiB2aWV3Qm94PVwiMCAwIDMzIDMyXCIgZmlsbD1cIm5vbmVcIiB4bWxucz1cImh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnXCI+XHJcbiAgICAgICAgPHJlY3QgeD1cIjAuNjY2NjcyXCIgd2lkdGg9XCIzMlwiIGhlaWdodD1cIjMyXCIgcng9XCI4XCIgZmlsbD1cInVybCgjcGFpbnQwX2xpbmVhcl8yODIwXzY4OSlcIiAvPlxyXG4gICAgICAgIDxwYXRoIGQ9XCJNMTkuMTY2NyA4LjVWMjMuNU0xMy4xNjY3IDguNUgyMC4xNjY3QzIxLjU2NjggOC41IDIyLjI2NjkgOC41IDIyLjgwMTYgOC43NzI0OEMyMy4yNzIxIDkuMDEyMTcgMjMuNjU0NSA5LjM5NDYyIDIzLjg5NDIgOS44NjUwMkMyNC4xNjY3IDEwLjM5OTggMjQuMTY2NyAxMS4wOTk5IDI0LjE2NjcgMTIuNVYxOS41QzI0LjE2NjcgMjAuOTAwMSAyNC4xNjY3IDIxLjYwMDIgMjMuODk0MiAyMi4xMzVDMjMuNjU0NSAyMi42MDU0IDIzLjI3MjEgMjIuOTg3OCAyMi44MDE2IDIzLjIyNzVDMjIuMjY2OSAyMy41IDIxLjU2NjggMjMuNSAyMC4xNjY3IDIzLjVIMTMuMTY2N0MxMS43NjY1IDIzLjUgMTEuMDY2NSAyMy41IDEwLjUzMTcgMjMuMjI3NUMxMC4wNjEzIDIyLjk4NzggOS42Nzg4NCAyMi42MDU0IDkuNDM5MTYgMjIuMTM1QzkuMTY2NjcgMjEuNjAwMiA5LjE2NjY3IDIwLjkwMDEgOS4xNjY2NyAxOS41VjEyLjVDOS4xNjY2NyAxMS4wOTk5IDkuMTY2NjcgMTAuMzk5OCA5LjQzOTE2IDkuODY1MDJDOS42Nzg4NCA5LjM5NDYyIDEwLjA2MTMgOS4wMTIxNyAxMC41MzE3IDguNzcyNDhDMTEuMDY2NSA4LjUgMTEuNzY2NSA4LjUgMTMuMTY2NyA4LjVaXCIgc3Ryb2tlPVwid2hpdGVcIiBzdHJva2VXaWR0aD1cIjEuNjdcIiBzdHJva2VMaW5lY2FwPVwicm91bmRcIiBzdHJva2VMaW5lam9pbj1cInJvdW5kXCIgLz5cclxuICAgICAgICA8ZGVmcz5cclxuICAgICAgICAgICAgPGxpbmVhckdyYWRpZW50IGlkPVwicGFpbnQwX2xpbmVhcl8yODIwXzY4OVwiIHgxPVwiMy4wMDE2M1wiIHkxPVwiMy41XCIgeDI9XCIzMC41MDE2XCIgeTI9XCIzMFwiIGdyYWRpZW50VW5pdHM9XCJ1c2VyU3BhY2VPblVzZVwiPlxyXG4gICAgICAgICAgICAgICAgPHN0b3Agc3RvcENvbG9yPVwiIzUwODFGNVwiIC8+XHJcbiAgICAgICAgICAgICAgICA8c3RvcCBvZmZzZXQ9XCIxXCIgc3RvcENvbG9yPVwiI0E3NjlGNVwiIC8+XHJcbiAgICAgICAgICAgIDwvbGluZWFyR3JhZGllbnQ+XHJcbiAgICAgICAgPC9kZWZzPlxyXG4gICAgPC9zdmc+LFxyXG4gICAgc3RhcjogKCkgPT4gPHN2ZyB3aWR0aD1cIjExNlwiIGhlaWdodD1cIjIwXCIgdmlld0JveD1cIjAgMCAxMTYgMjBcIiBmaWxsPVwibm9uZVwiIHhtbG5zPVwiaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmdcIj5cclxuICAgICAgICA8cGF0aCBkPVwiTTkuMTQzMTkgMS40MjM3MkM5LjUzMTg1IDAuNzc3OTAyIDEwLjQ2ODEgMC43Nzc5MDEgMTAuODU2OCAxLjQyMzcyTDEzLjA3MzEgNS4xMDY1MUMxMy4yMTI4IDUuMzM4NTMgMTMuNDQwNSA1LjUwNCAxMy43MDQzIDUuNTY1MDlMMTcuODkxOCA2LjUzNDkxQzE4LjYyNjEgNi43MDQ5OCAxOC45MTU0IDcuNTk1NDUgMTguNDIxMyA4LjE2NDY2TDE1LjYwMzYgMTEuNDEwNkMxNS40MjYxIDExLjYxNTEgMTUuMzM5MSAxMS44ODI4IDE1LjM2MjUgMTIuMTUyNkwxNS43MzQyIDE2LjQzNDdDMTUuNzk5NCAxNy4xODU3IDE1LjA0MTkgMTcuNzM2IDE0LjM0NzggMTcuNDQyTDEwLjM5MDEgMTUuNzY1M0MxMC4xNDA4IDE1LjY1OTYgOS44NTkyNCAxNS42NTk2IDkuNjA5OTEgMTUuNzY1M0w1LjY1MjE2IDE3LjQ0MkM0Ljk1ODEzIDE3LjczNiA0LjIwMDY1IDE3LjE4NTcgNC4yNjU4MiAxNi40MzQ3TDQuNjM3NDUgMTIuMTUyNkM0LjY2MDg3IDExLjg4MjggNC41NzM4NyAxMS42MTUxIDQuMzk2MzcgMTEuNDEwNkwxLjU3ODcxIDguMTY0NjZDMS4wODQ2IDcuNTk1NDUgMS4zNzM5MyA2LjcwNDk4IDIuMTA4MjQgNi41MzQ5MUw2LjI5NTY3IDUuNTY1MDlDNi41NTk0OCA1LjUwNCA2Ljc4NzIzIDUuMzM4NTMgNi45MjY4NSA1LjEwNjUyTDkuMTQzMTkgMS40MjM3MlpcIiBmaWxsPVwiI0Y5QjgzQVwiIC8+XHJcbiAgICAgICAgPHBhdGggZD1cIk0zMy4xNDMyIDEuNDIzNzJDMzMuNTMxOSAwLjc3NzkwMiAzNC40NjgxIDAuNzc3OTAxIDM0Ljg1NjggMS40MjM3MkwzNy4wNzMxIDUuMTA2NTFDMzcuMjEyOCA1LjMzODUzIDM3LjQ0MDUgNS41MDQgMzcuNzA0MyA1LjU2NTA5TDQxLjg5MTggNi41MzQ5MUM0Mi42MjYxIDYuNzA0OTggNDIuOTE1NCA3LjU5NTQ1IDQyLjQyMTMgOC4xNjQ2NkwzOS42MDM2IDExLjQxMDZDMzkuNDI2MSAxMS42MTUxIDM5LjMzOTEgMTEuODgyOCAzOS4zNjI1IDEyLjE1MjZMMzkuNzM0MiAxNi40MzQ3QzM5Ljc5OTQgMTcuMTg1NyAzOS4wNDE5IDE3LjczNiAzOC4zNDc4IDE3LjQ0MkwzNC4zOTAxIDE1Ljc2NTNDMzQuMTQwOCAxNS42NTk2IDMzLjg1OTIgMTUuNjU5NiAzMy42MDk5IDE1Ljc2NTNMMjkuNjUyMiAxNy40NDJDMjguOTU4MSAxNy43MzYgMjguMjAwNiAxNy4xODU3IDI4LjI2NTggMTYuNDM0N0wyOC42Mzc1IDEyLjE1MjZDMjguNjYwOSAxMS44ODI4IDI4LjU3MzkgMTEuNjE1MSAyOC4zOTY0IDExLjQxMDZMMjUuNTc4NyA4LjE2NDY2QzI1LjA4NDYgNy41OTU0NSAyNS4zNzM5IDYuNzA0OTggMjYuMTA4MiA2LjUzNDkxTDMwLjI5NTcgNS41NjUwOUMzMC41NTk1IDUuNTA0IDMwLjc4NzIgNS4zMzg1MyAzMC45MjY5IDUuMTA2NTJMMzMuMTQzMiAxLjQyMzcyWlwiIGZpbGw9XCIjRjlCODNBXCIgLz5cclxuICAgICAgICA8cGF0aCBkPVwiTTU3LjE0MzIgMS40MjM3MkM1Ny41MzE5IDAuNzc3OTAyIDU4LjQ2ODEgMC43Nzc5MDEgNTguODU2OCAxLjQyMzcyTDYxLjA3MzEgNS4xMDY1MUM2MS4yMTI4IDUuMzM4NTMgNjEuNDQwNSA1LjUwNCA2MS43MDQzIDUuNTY1MDlMNjUuODkxOCA2LjUzNDkxQzY2LjYyNjEgNi43MDQ5OCA2Ni45MTU0IDcuNTk1NDUgNjYuNDIxMyA4LjE2NDY2TDYzLjYwMzYgMTEuNDEwNkM2My40MjYxIDExLjYxNTEgNjMuMzM5MSAxMS44ODI4IDYzLjM2MjUgMTIuMTUyNkw2My43MzQyIDE2LjQzNDdDNjMuNzk5NCAxNy4xODU3IDYzLjA0MTkgMTcuNzM2IDYyLjM0NzggMTcuNDQyTDU4LjM5MDEgMTUuNzY1M0M1OC4xNDA4IDE1LjY1OTYgNTcuODU5MiAxNS42NTk2IDU3LjYwOTkgMTUuNzY1M0w1My42NTIyIDE3LjQ0MkM1Mi45NTgxIDE3LjczNiA1Mi4yMDA2IDE3LjE4NTcgNTIuMjY1OCAxNi40MzQ3TDUyLjYzNzUgMTIuMTUyNkM1Mi42NjA5IDExLjg4MjggNTIuNTczOSAxMS42MTUxIDUyLjM5NjQgMTEuNDEwNkw0OS41Nzg3IDguMTY0NjZDNDkuMDg0NiA3LjU5NTQ1IDQ5LjM3MzkgNi43MDQ5OCA1MC4xMDgyIDYuNTM0OTFMNTQuMjk1NyA1LjU2NTA5QzU0LjU1OTUgNS41MDQgNTQuNzg3MiA1LjMzODUzIDU0LjkyNjkgNS4xMDY1Mkw1Ny4xNDMyIDEuNDIzNzJaXCIgZmlsbD1cIiNGOUI4M0FcIiAvPlxyXG4gICAgICAgIDxwYXRoIGQ9XCJNODEuMTQzMiAxLjQyMzcyQzgxLjUzMTkgMC43Nzc5MDIgODIuNDY4MSAwLjc3NzkwMSA4Mi44NTY4IDEuNDIzNzJMODUuMDczMSA1LjEwNjUxQzg1LjIxMjggNS4zMzg1MyA4NS40NDA1IDUuNTA0IDg1LjcwNDMgNS41NjUwOUw4OS44OTE4IDYuNTM0OTFDOTAuNjI2MSA2LjcwNDk4IDkwLjkxNTQgNy41OTU0NSA5MC40MjEzIDguMTY0NjZMODcuNjAzNiAxMS40MTA2Qzg3LjQyNjEgMTEuNjE1MSA4Ny4zMzkxIDExLjg4MjggODcuMzYyNSAxMi4xNTI2TDg3LjczNDIgMTYuNDM0N0M4Ny43OTk0IDE3LjE4NTcgODcuMDQxOSAxNy43MzYgODYuMzQ3OCAxNy40NDJMODIuMzkwMSAxNS43NjUzQzgyLjE0MDggMTUuNjU5NiA4MS44NTkyIDE1LjY1OTYgODEuNjA5OSAxNS43NjUzTDc3LjY1MjIgMTcuNDQyQzc2Ljk1ODEgMTcuNzM2IDc2LjIwMDYgMTcuMTg1NyA3Ni4yNjU4IDE2LjQzNDdMNzYuNjM3NSAxMi4xNTI2Qzc2LjY2MDkgMTEuODgyOCA3Ni41NzM5IDExLjYxNTEgNzYuMzk2NCAxMS40MTA2TDczLjU3ODcgOC4xNjQ2NkM3My4wODQ2IDcuNTk1NDUgNzMuMzczOSA2LjcwNDk4IDc0LjEwODIgNi41MzQ5MUw3OC4yOTU3IDUuNTY1MDlDNzguNTU5NSA1LjUwNCA3OC43ODcyIDUuMzM4NTMgNzguOTI2OSA1LjEwNjUyTDgxLjE0MzIgMS40MjM3MlpcIiBmaWxsPVwiI0Y5QjgzQVwiIC8+XHJcbiAgICAgICAgPHBhdGggZD1cIk0xMDUuMTQzIDEuNDIzNzJDMTA1LjUzMiAwLjc3NzkwMiAxMDYuNDY4IDAuNzc3OTAxIDEwNi44NTcgMS40MjM3MkwxMDkuMDczIDUuMTA2NTFDMTA5LjIxMyA1LjMzODUzIDEwOS40NDEgNS41MDQgMTA5LjcwNCA1LjU2NTA5TDExMy44OTIgNi41MzQ5MUMxMTQuNjI2IDYuNzA0OTggMTE0LjkxNSA3LjU5NTQ1IDExNC40MjEgOC4xNjQ2NkwxMTEuNjA0IDExLjQxMDZDMTExLjQyNiAxMS42MTUxIDExMS4zMzkgMTEuODgyOCAxMTEuMzYzIDEyLjE1MjZMMTExLjczNCAxNi40MzQ3QzExMS43OTkgMTcuMTg1NyAxMTEuMDQyIDE3LjczNiAxMTAuMzQ4IDE3LjQ0MkwxMDYuMzkgMTUuNzY1M0MxMDYuMTQxIDE1LjY1OTYgMTA1Ljg1OSAxNS42NTk2IDEwNS42MSAxNS43NjUzTDEwMS42NTIgMTcuNDQyQzEwMC45NTggMTcuNzM2IDEwMC4yMDEgMTcuMTg1NyAxMDAuMjY2IDE2LjQzNDdMMTAwLjYzNyAxMi4xNTI2QzEwMC42NjEgMTEuODgyOCAxMDAuNTc0IDExLjYxNTEgMTAwLjM5NiAxMS40MTA2TDk3LjU3ODcgOC4xNjQ2NkM5Ny4wODQ2IDcuNTk1NDUgOTcuMzczOSA2LjcwNDk4IDk4LjEwODIgNi41MzQ5MUwxMDIuMjk2IDUuNTY1MDlDMTAyLjU1OSA1LjUwNCAxMDIuNzg3IDUuMzM4NTMgMTAyLjkyNyA1LjEwNjUyTDEwNS4xNDMgMS40MjM3MlpcIiBmaWxsPVwiI0Y5QjgzQVwiIC8+XHJcbiAgICA8L3N2Zz4sXHJcbiAgICByZXZpZXc6ICgpID0+IDxzdmcgd2lkdGg9XCIyMFwiIGhlaWdodD1cIjIwXCIgdmlld0JveD1cIjAgMCAyMCAyMFwiIGZpbGw9XCJub25lXCIgeG1sbnM9XCJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2Z1wiPlxyXG4gICAgICAgIDxwYXRoIGQ9XCJNNy41NjI0NiAxMS44NzQ4TDkuOTk5OTYgMTAuMzk1N0wxMi40Mzc1IDExLjg3NDhMMTEuNzkxNiA5LjEwNEwxMy45NTgzIDcuMjI5TDExLjEwNDEgNi45OTk4NEw5Ljk5OTk2IDQuMzc0ODRMOC44OTU3OSA2Ljk5OTg0TDYuMDQxNjMgNy4yMjlMOC4yMDgyOSA5LjEwNEw3LjU2MjQ2IDExLjg3NDhaTTEuNjY2NjMgMTguMzMzMlYzLjMzMzE3QzEuNjY2NjMgMi44NzQ4NCAxLjgyOTk2IDIuNDgyNjIgMi4xNTY2MyAyLjE1NjVDMi40ODMyOSAxLjgzMDM5IDIuODc1NTEgMS42NjcwNiAzLjMzMzI5IDEuNjY2NUgxNi42NjY2QzE3LjEyNSAxLjY2NjUgMTcuNTE3NSAxLjgyOTg0IDE3Ljg0NDEgMi4xNTY1QzE4LjE3MDggMi40ODMxNyAxOC4zMzM4IDIuODc1MzkgMTguMzMzMyAzLjMzMzE3VjEzLjMzMzJDMTguMzMzMyAxMy43OTE1IDE4LjE3MDIgMTQuMTg0IDE3Ljg0NDEgMTQuNTEwN0MxNy41MTggMTQuODM3MyAxNy4xMjU1IDE1LjAwMDQgMTYuNjY2NiAxNC45OTk4SDQuOTk5OTZMMS42NjY2MyAxOC4zMzMyWk00LjI5MTYzIDEzLjMzMzJIMTYuNjY2NlYzLjMzMzE3SDMuMzMzMjlWMTQuMjcwN0w0LjI5MTYzIDEzLjMzMzJaXCIgZmlsbD1cImN1cnJlbnRDb2xvclwiIC8+XHJcbiAgICA8L3N2Zz5cclxuXHJcblxyXG5cclxufTtcclxuXHJcbmNvbnN0IEljb24gPSAoeyBpY29uLCB0b29sdGlwLCBsYWJlbCB9KSA9PiB7XHJcbiAgICBjb25zdCBJY29uID0gaWNvbnNbaWNvbl1cclxuICAgIHJldHVybiAoXHJcbiAgICAgICAgPD5cclxuICAgICAgICAgICAge0ljb24gJiYgPEljb24gLz59XHJcbiAgICAgICAgICAgIHtsYWJlbCAmJiA8aDMgY2xhc3NOYW1lPVwiY3dMYWJlbFwiPntsYWJlbH08L2gzPn1cclxuICAgICAgICAgICAge3Rvb2x0aXAgJiYgPHNwYW4gY2xhc3NOYW1lPVwiY3ctdG9vbHRpcFwiPnt0b29sdGlwfTwvc3Bhbj59XHJcbiAgICAgICAgPC8+XHJcbiAgICApXHJcbn1cclxuXHJcbmV4cG9ydCBkZWZhdWx0IEljb24iLCJpbXBvcnQgeyB2aXBTaXRlQ2FyZSwgc2FsZXNGdW5uZWwsIGN1c3RvbUZvbnRzLCB0aGVtZUNsdWIgfSBmcm9tIFwiLi4vLi4vY29tcG9uZW50cy9pbWFnZXNcIjtcclxuaW1wb3J0IHsgSWNvbiB9IGZyb20gJy4uJztcclxuaW1wb3J0IHsgX18gfSBmcm9tIFwiQHdvcmRwcmVzcy9pMThuXCJcclxuXHJcbmV4cG9ydCBkZWZhdWx0IGZ1bmN0aW9uIE9mZmVyKCkge1xyXG5cclxuICAgIGNvbnN0IG9mZmVyTGlzdCA9IFtcclxuICAgICAgICB7XHJcbiAgICAgICAgICAgIGhlYWRpbmc6IF9fKFwiR2V0IEFsbCAyMCBQcmVtaXVtIFRoZW1lcyBXb3J0aCAkMTE4MCBmb3IgSnVzdCAkMTQ5IVwiLCAnY29va2VyeScpLFxyXG4gICAgICAgICAgICBwYXJhOiBfXyhcIkpvaW4gdGhlIEJsb3Nzb20gVGhlbWVzIFRoZW1lIENsdWIgdG8gYWNjZXNzIGEgZGl2ZXJzZSBjb2xsZWN0aW9uIG9mIGJlYXV0aWZ1bGx5IGRlc2lnbmVkLCBmZWF0dXJlLXJpY2ggV29yZFByZXNzIHRoZW1lcy4gUGVyZmVjdCBmb3IgYmxvZ2dlcnMsIGJ1c2luZXNzZXMsIGFuZCBjcmVhdGl2ZXMsIG91ciB0aGVtZXMgb2ZmZXIgc2VhbWxlc3MgY3VzdG9taXphdGlvbiwgcmVzcG9uc2l2ZSBkZXNpZ24sIGFuZCBleGNlbGxlbnQgc3VwcG9ydCB0byBoZWxwIHlvdSBjcmVhdGUgYSBzdHVubmluZyBvbmxpbmUgcHJlc2VuY2UgZWZmb3J0bGVzc2x5LlwiLCAnY29va2VyeScpLFxyXG4gICAgICAgICAgICBpbWFnZXVybDogdGhlbWVDbHViLFxyXG4gICAgICAgICAgICBidXR0b25UZXh0OiBfXyhcIlZpZXcgQWxsIFRoZW1lc1wiLCAnY29va2VyeScpLFxyXG4gICAgICAgICAgICBidXR0b25Vcmw6ICdodHRwczovL2Jsb3Nzb210aGVtZXMuY29tL3RoZW1lL3ByZW1pdW0td29yZHByZXNzLXRoZW1lcy8/dXRtX3NvdXJjZT1jb29rZXJ5JnV0bV9tZWRpdW09ZGFzaGJvYXJkJnV0bV9jYW1wYWlnbj1wcmVtaXVtX3RoZW1lcycsXHJcbiAgICAgICAgICAgIGJ1dHRvblR3bzogX18oXCJCdXkgTm93XCIsICdjb29rZXJ5JyksXHJcbiAgICAgICAgICAgIGJ1dHRvblR3b1VybDogY3dfZGFzaGJvYXJkLnRoZW1lX2NsdWJfdXBncmFkZVxyXG4gICAgICAgIH0sXHJcbiAgICAgICAge1xyXG4gICAgICAgICAgICBoZWFkaW5nOiBfXyhcIlNhbGVzIEZ1bm5lbCBhbmQgTGFuZGluZyBQYWdlIFRlbXBsYXRlcyBmb3IgV29yZFByZXNzXCIsICdjb29rZXJ5JyksXHJcbiAgICAgICAgICAgIHBhcmE6IF9fKFwiVHJhbnNmb3JtIHlvdXIgd2Vic2l0ZSBpbnRvIGEgbGVhZCBhbmQgc2FsZXMgZ2VuZXJhdGluZyBtYWNoaW5lIHdpdGggb3VyIHJlYWR5LW1hZGUgc2FsZXMgZnVubmVsIGFuZCBsYW5kaW5nIHBhZ2UgdGVtcGxhdGVzLiBQZXJmZWN0IGZvciBraWNrc3RhcnRpbmcgeW91ciBvbmxpbmUgc3VjY2VzcyFcIiwgJ2Nvb2tlcnknKSxcclxuICAgICAgICAgICAgaW1hZ2V1cmw6IHNhbGVzRnVubmVsLFxyXG4gICAgICAgICAgICBidXR0b25Vcmw6IGN3X2Rhc2hib2FyZC5zYWxlc19mdW5uZWwsXHJcbiAgICAgICAgICAgIGJ1dHRvblRleHQ6IF9fKFwiQnV5IE5vd1wiLCAnY29va2VyeScpLFxyXG4gICAgICAgIH0sXHJcbiAgICAgICAge1xyXG4gICAgICAgICAgICBoZWFkaW5nOiBfXyhcIkVuaGFuY2UgWW91ciBXZWJzaXRlJ3MgQWVzdGhldGljcyB3aXRoIFdQIEN1c3RvbSBGb250cyFcIiwgJ2Nvb2tlcnknKSxcclxuICAgICAgICAgICAgcGFyYTogX18oXCJFbGV2YXRlIHlvdXIgdHlwb2dyYXBoeSBhbmQgc3RhbmQgb3V0IGZyb20gdGhlIGNyb3dkLiBVcGdyYWRlIG5vdyB0byB1bmxvY2sgZW5kbGVzcyBmb250IHBvc3NpYmlsaXRpZXMgZm9yIHlvdXIgV29yZFByZXNzIHNpdGUhXCIsICdjb29rZXJ5JyksXHJcbiAgICAgICAgICAgIGltYWdldXJsOiBjdXN0b21Gb250cyxcclxuICAgICAgICAgICAgYnV0dG9uVXJsOiBjd19kYXNoYm9hcmQuY3VzdG9tX2ZvbnRzLFxyXG4gICAgICAgICAgICBidXR0b25UZXh0OiBfXyhcIkxlYXJuIE1vcmVcIiwgJ2Nvb2tlcnknKSxcclxuICAgICAgICB9LFxyXG4gICAgICAgIHtcclxuICAgICAgICAgICAgaGVhZGluZzogX18oXCJWSVAgQ2FyZSAtIEV4cGVydCBXZWJzaXRlIENhcmUgZm9yIFdvcmRQcmVzc1wiLCAnY29va2VyeScpLFxyXG4gICAgICAgICAgICBwYXJhOiBfXyhcIk91ciBWSVAgQ2FyZSBzZXJ2aWNlIG9mZmVycyBjb21wcmVoZW5zaXZlIG1haW50ZW5hbmNlLCBwcm90ZWN0aW9uLCBhbmQgc3BlZWQgb3B0aW1pemF0aW9uIGZvciB5b3VyIFdvcmRQcmVzcyBzaXRlLCBlbnN1cmluZyB5b3UgbmV2ZXIgaGF2ZSB0byB3b3JyeSBhYm91dCBpdCBhZ2Fpbi4gUmVsYXggYW5kIGxldCB1cyBoYW5kbGUgZXZlcnl0aGluZyFcIiwgJ2Nvb2tlcnknKSxcclxuICAgICAgICAgICAgaW1hZ2V1cmw6IHZpcFNpdGVDYXJlLFxyXG4gICAgICAgICAgICBidXR0b25Vcmw6IGN3X2Rhc2hib2FyZC52aXBfc2l0ZV9jYXJlLFxyXG4gICAgICAgICAgICBidXR0b25UZXh0OiBfXyhcIkdldCBTdGFydGVkXCIsICdjb29rZXJ5JyksXHJcbiAgICAgICAgfVxyXG4gICAgXTtcclxuXHJcbiAgICBjb25zdCBvZmZlckxpc3RpbmcgPSBvZmZlckxpc3QubWFwKChpdGVtLCBpbmRleCkgPT4ge1xyXG4gICAgICAgIHJldHVybiAoXHJcbiAgICAgICAgICAgIDxkaXYgY2xhc3NOYW1lPSdjdy1vZmZlcnMnIGtleT17aW5kZXh9PlxyXG4gICAgICAgICAgICAgICAgPGRpdiBjbGFzc05hbWU9XCJjdy1vZmZlcmJvZHlcIj5cclxuICAgICAgICAgICAgICAgICAgICA8aDMgY2xhc3NOYW1lPVwiY3ctaGVhZGluZ1wiPntpdGVtLmhlYWRpbmd9PC9oMz5cclxuICAgICAgICAgICAgICAgICAgICA8cCBjbGFzc05hbWU9XCJjdy10ZXh0XCI+e2l0ZW0ucGFyYX08L3A+XHJcbiAgICAgICAgICAgICAgICAgICAgPGRpdiBjbGFzc05hbWU9XCJjdy1idXR0b25cIj5cclxuICAgICAgICAgICAgICAgICAgICAgICAgPGEgaHJlZj17aXRlbS5idXR0b25Vcmx9IHRhcmdldD1cIl9ibGFua1wiIGNsYXNzTmFtZT1cImN3LWJ1dHRvbi1idG4gcHJpbWFyeS1idG5cIj57aXRlbS5idXR0b25UZXh0fTxJY29uIGljb249XCJhcnJvd3R3b1wiIC8+PC9hPlxyXG4gICAgICAgICAgICAgICAgICAgICAgICB7aXRlbS5idXR0b25Ud28gJiYgPGEgaHJlZj17aXRlbS5idXR0b25Ud29Vcmx9IHRhcmdldD1cIl9ibGFua1wiIGNsYXNzTmFtZT1cImN3LWJ1dHRvbi1idG4gb3V0bGluZVwiPntpdGVtLmJ1dHRvblR3b308SWNvbiBpY29uPVwiYXJyb3d0d29cIiAvPjwvYT59XHJcbiAgICAgICAgICAgICAgICAgICAgPC9kaXY+XHJcbiAgICAgICAgICAgICAgICA8L2Rpdj5cclxuICAgICAgICAgICAgICAgIDxkaXYgY2xhc3NOYW1lPVwiY3ctb2ZmZXItaW1hZ2VcIj5cclxuICAgICAgICAgICAgICAgICAgICA8aW1nIHNyYz17aXRlbS5pbWFnZXVybH0gYWx0PVwiYmxvc3NvbVwiIC8+XHJcbiAgICAgICAgICAgICAgICA8L2Rpdj5cclxuICAgICAgICAgICAgPC9kaXY+XHJcbiAgICAgICAgKTtcclxuICAgIH0pO1xyXG5cclxuICAgIHJldHVybiAoXHJcbiAgICAgICAgPGRpdiBjbGFzc05hbWU9XCJjdy1vZmZlci13cmFwXCI+XHJcbiAgICAgICAgICAgIHtvZmZlckxpc3Rpbmd9XHJcbiAgICAgICAgPC9kaXY+XHJcbiAgICApXHJcbn0iLCJpbXBvcnQgUmVhY3QgZnJvbSAncmVhY3QnXHJcbmltcG9ydCBJY29uIGZyb20gJy4uL0ljb24nO1xyXG5cclxuY29uc3QgU2lkZWJhciA9ICh7c2lkZWJhclNldHRpbmdzLCBvcGVuSW5OZXdUYWIgfSkgPT4ge1xyXG5cclxuICAgIGNvbnN0IHNpZGViYXJMaXN0aW5nID0gKHNpZGViYXIpID0+IHtcclxuICAgICAgICByZXR1cm4gc2lkZWJhci5tYXAoKHNpZGViYXJpdGVtLCBpbmRleCkgPT4ge1xyXG4gICAgICAgICAgICByZXR1cm4gKFxyXG4gICAgICAgICAgICAgICAgPGRpdiBjbGFzc05hbWU9XCJjdy1zaWRlYmFyYm9keVwiIGtleT17aW5kZXh9PlxyXG4gICAgICAgICAgICAgICAgICAgIDxoMz57c2lkZWJhcml0ZW0uaGVhZGluZ308L2gzPlxyXG4gICAgICAgICAgICAgICAgICAge3NpZGViYXJpdGVtLmljb24gJiYgPHNwYW4+PEljb24gaWNvbj17c2lkZWJhcml0ZW0uaWNvbn0vPjwvc3Bhbj59XHJcbiAgICAgICAgICAgICAgICAgICAgPHA+e3NpZGViYXJpdGVtLnBhcmF9PC9wPlxyXG4gICAgICAgICAgICAgICAgICAgIDxkaXYgY2xhc3NOYW1lPVwiY3ctYnV0dG9uXCI+XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIDxhIGhyZWY9e3NpZGViYXJpdGVtLmJ1dHRvblVybH0gdGFyZ2V0PXtvcGVuSW5OZXdUYWIgPyBcIl9ibGFua1wiIDogXCJfc2VsZlwifSBjbGFzc05hbWU9XCJjdy1idXR0b24tYnRuIG91dGxpbmVcIj5cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIHtzaWRlYmFyaXRlbS5pbWFnZXVybH1cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIHtzaWRlYmFyaXRlbS5idXR0b25UZXh0fVxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgPEljb24gaWNvbj1cImFycm93dHdvXCIgLz5cclxuICAgICAgICAgICAgICAgICAgICAgICAgPC9hPlxyXG4gICAgICAgICAgICAgICAgICAgIDwvZGl2PlxyXG4gICAgICAgICAgICAgICAgPC9kaXY+XHJcbiAgICAgICAgICAgIClcclxuICAgICAgICB9KVxyXG4gICAgfVxyXG5cclxuICAgIHJldHVybiAoXHJcbiAgICAgICAgPD5cclxuICAgICAgICAgICAgPGRpdiBjbGFzc05hbWU9XCJjdy1zaWRlYmFyXCI+XHJcbiAgICAgICAgICAgICAgICA8ZGl2IGNsYXNzTmFtZT1cImN3LXNpZGViYXItbGlzdFwiPlxyXG4gICAgICAgICAgICAgICAgICAgIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgc2lkZWJhckxpc3Rpbmcoc2lkZWJhclNldHRpbmdzKVxyXG4gICAgICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgICAgIDwvZGl2PlxyXG4gICAgICAgICAgICA8L2Rpdj5cclxuICAgICAgICA8Lz5cclxuICAgIClcclxufVxyXG5leHBvcnQgZGVmYXVsdCBTaWRlYmFyIiwiaW1wb3J0IHsgSWNvbiB9IGZyb20gXCIuLlwiO1xyXG5pbXBvcnQgeyBfXyB9IGZyb20gXCJAd29yZHByZXNzL2kxOG5cIlxyXG5cclxuY29uc3QgVGFiSGVhZGVyID0gKHsgdGl0bGUgfSkgPT4ge1xyXG4gICAgY29uc3QgZG9jTGlua3MgPSBbXHJcbiAgICAgICAge1xyXG4gICAgICAgICAgICBuYW1lOiBfXygnVmlldyBXZWJzaXRlJywgJ2Nvb2tlcnknKSxcclxuICAgICAgICAgICAgbGluazogY3dfZGFzaGJvYXJkLndlYnNpdGUsXHJcbiAgICAgICAgICAgIGljb246IFwiZ2xvYmVcIlxyXG4gICAgICAgIH0sXHJcbiAgICAgICAge1xyXG4gICAgICAgICAgICBuYW1lOiBfXygnVmlldyBUdXRvcmlhbHMgJywgJ2Nvb2tlcnknKSxcclxuICAgICAgICAgICAgbGluazogY3dfZGFzaGJvYXJkLnZpZGVvdHV0b3JpYWwsXHJcbiAgICAgICAgICAgIGljb246IFwieW91dHViZVwiXHJcbiAgICAgICAgfSxcclxuICAgICAgICB7XHJcbiAgICAgICAgICAgIG5hbWU6IF9fKCdDb250YWN0IFN1cHBvcnQnLCAnY29va2VyeScpLFxyXG4gICAgICAgICAgICBsaW5rOiBjd19kYXNoYm9hcmQuc3VwcG9ydCxcclxuICAgICAgICAgICAgaWNvbjogXCJzdXBwb3J0XCJcclxuICAgICAgICB9LFxyXG4gICAgICAgIHtcclxuICAgICAgICAgICAgbmFtZTogX18oJ0RvY3MnLCAnY29va2VyeScpLFxyXG4gICAgICAgICAgICBsaW5rOiBjd19kYXNoYm9hcmQuZG9jbWVudGF0aW9uLFxyXG4gICAgICAgICAgICBpY29uOiBcImRvY1wiXHJcbiAgICAgICAgfVxyXG4gICAgXTtcclxuXHJcbiAgICBjb25zdCBkb2NMaW5rTGlzdGluZyA9ICgpID0+IHtcclxuICAgICAgICByZXR1cm4gZG9jTGlua3MubWFwKChsaXN0LCBpbmRleCkgPT4gKFxyXG4gICAgICAgICAgICA8YSBrZXk9e2luZGV4fSBocmVmPXtsaXN0Lmxpbmt9IHRhcmdldD1cIl9ibGFua1wiPlxyXG4gICAgICAgICAgICAgICAgPEljb24gaWNvbj17bGlzdC5pY29ufSB0b29sdGlwPXtsaXN0Lm5hbWV9IC8+XHJcbiAgICAgICAgICAgIDwvYT5cclxuICAgICAgICApKTtcclxuICAgIH07XHJcblxyXG4gICAgcmV0dXJuIChcclxuICAgICAgICA8PlxyXG4gICAgICAgICAgICA8aGVhZGVyIGNsYXNzTmFtZT1cIm5hdmJhclwiPlxyXG4gICAgICAgICAgICAgICAgPGgxPnt0aXRsZX08L2gxPlxyXG4gICAgICAgICAgICAgICAgPGRpdiBjbGFzc05hbWU9XCJpbmZvXCI+XHJcbiAgICAgICAgICAgICAgICAgICAgPHNwYW4gY2xhc3NOYW1lPVwidmVyc2lvblwiPlxyXG4gICAgICAgICAgICAgICAgICAgICAgICB7Y3dfZGFzaGJvYXJkLnRoZW1lX3ZlcnNpb259XHJcbiAgICAgICAgICAgICAgICAgICAgPC9zcGFuPlxyXG4gICAgICAgICAgICAgICAgICAgIDxkaXYgY2xhc3NOYW1lPVwiZG9jLWxpbmtzXCI+XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIHtkb2NMaW5rTGlzdGluZygpfVxyXG4gICAgICAgICAgICAgICAgICAgIDwvZGl2PlxyXG4gICAgICAgICAgICAgICAgPC9kaXY+XHJcbiAgICAgICAgICAgIDwvaGVhZGVyPlxyXG5cclxuICAgICAgICA8Lz5cclxuICAgIClcclxufVxyXG5cclxuZXhwb3J0IGRlZmF1bHQgVGFiSGVhZGVyO1xyXG4iLCJpbXBvcnQgdXNlVGFicyBmcm9tIFwiLi91c2VUYWJzXCI7XHJcbmltcG9ydCB7IFRhYkhlYWRlciB9IGZyb20gXCIuLlwiO1xyXG5pbXBvcnQgeyBsb2dvfSBmcm9tIFwiLi4vLi4vY29tcG9uZW50cy9pbWFnZXNcIjtcclxuaW1wb3J0IHsgX18gfSBmcm9tICdAd29yZHByZXNzL2kxOG4nO1xyXG5cclxuY29uc3QgVGFiID0gKHsgdGFic0RhdGEsIG9uQ2hhbmdlLCBhY3RpdmVUYWJUaXRsZSB9KSA9PiB7XHJcbiAgY29uc3QgeyByZW5kZXJUYWJzLCByZW5kZXJDb250ZW50IH0gPSB1c2VUYWJzKHRhYnNEYXRhLCAwLCBvbkNoYW5nZSk7XHJcblxyXG4gIHJldHVybiAoXHJcbiAgICA8ZGl2IGNsYXNzTmFtZT1cImN3LXRhYnMtY29udGFpbmVyXCI+XHJcbiAgICAgIDxkaXYgY2xhc3NOYW1lPVwiY3ctdGFic1wiPlxyXG4gICAgICAgIDxkaXYgY2xhc3NOYW1lPVwid3JhcHBlclwiPlxyXG4gICAgICAgICAgPGRpdiBjbGFzc05hbWU9XCJ0b3BcIj5cclxuICAgICAgICAgICAgPGRpdiBjbGFzc05hbWU9XCJsb2dvXCI+XHJcbiAgICAgICAgICAgICAgPGltZyBzcmM9e2xvZ299IGFsdD1cImxvZ29cIiAvPlxyXG4gICAgICAgICAgICA8L2Rpdj5cclxuICAgICAgICAgICAgPGRpdiBjbGFzc05hbWU9XCJjdy10YWJzLWJ1dHRvblwiPlxyXG4gICAgICAgICAgICAgIHtyZW5kZXJUYWJzKCl9XHJcbiAgICAgICAgICAgIDwvZGl2PlxyXG4gICAgICAgICAgPC9kaXY+XHJcblxyXG4gICAgICAgIDwvZGl2PlxyXG5cclxuICAgICAgPC9kaXY+XHJcbiAgICAgIDxkaXYgY2xhc3NOYW1lPVwid3JhcHBlclwiPlxyXG4gICAgICAgIDxUYWJIZWFkZXIgdGl0bGU9e2FjdGl2ZVRhYlRpdGxlfSAvPlxyXG4gICAgICAgIDxkaXYgY2xhc3NOYW1lPVwiY3ctdGFicy1jb250ZW50XCI+XHJcbiAgICAgICAgICB7cmVuZGVyQ29udGVudCgpfVxyXG4gICAgICAgIDwvZGl2PlxyXG4gICAgICA8L2Rpdj5cclxuICAgIDwvZGl2PlxyXG4gICk7XHJcbn07XHJcblxyXG5leHBvcnQgZGVmYXVsdCBUYWI7IiwiaW1wb3J0IHsgdXNlUmVmLCB1c2VTdGF0ZSwgdXNlRWZmZWN0LCB1c2VNZW1vLCB1c2VDYWxsYmFjayB9IGZyb20gJ3JlYWN0JztcclxuXHJcbmZ1bmN0aW9uIHVzZVRhYnMoaW5pdGlhbFRhYnMsIGluaXRpYWxBY3RpdmVUYWIgPSAwLCBvbkNoYW5nZSkge1xyXG4gIGNvbnN0IHRhYnNSZWYgPSB1c2VSZWYoaW5pdGlhbFRhYnMpO1xyXG4gIGNvbnN0IFthY3RpdmVUYWIsIHNldEFjdGl2ZVRhYl0gPSB1c2VTdGF0ZShpbml0aWFsQWN0aXZlVGFiKTtcclxuXHJcbiAgY29uc3QgaGFuZGxlVGFiQ2xpY2sgPSB1c2VDYWxsYmFjayhcclxuICAgIChpbmRleCkgPT4ge1xyXG4gICAgICBpZiAoaW5kZXggIT09IGFjdGl2ZVRhYikge1xyXG4gICAgICAgIHNldEFjdGl2ZVRhYihpbmRleCk7XHJcbiAgICAgICAgY29uc3QgbmV3SGFzaCA9IHRhYnNSZWYuY3VycmVudFtpbmRleF0udGl0bGUudG9Mb3dlckNhc2UoKS5yZXBsYWNlKC8gL2csIFwiLVwiKTtcclxuICAgICAgICBpZiAob25DaGFuZ2UpIHtcclxuICAgICAgICAgIG9uQ2hhbmdlKHRhYnNSZWYuY3VycmVudFtpbmRleF0udGl0bGUpO1xyXG4gICAgICAgIH1cclxuICAgICAgICBpZiAodHlwZW9mIHdpbmRvdyAhPT0gJ3VuZGVmaW5lZCcpIHtcclxuICAgICAgICAgIHdpbmRvdy5sb2NhdGlvbi5oYXNoID0gbmV3SGFzaDtcclxuICAgICAgICB9XHJcbiAgICAgIH1cclxuICAgIH0sXHJcbiAgICBbYWN0aXZlVGFiLCBvbkNoYW5nZV1cclxuICApO1xyXG5cclxuICBjb25zdCBjaGVja0hhc2ggPSB1c2VDYWxsYmFjaygoKSA9PiB7XHJcbiAgICBpZiAodHlwZW9mIHdpbmRvdyAhPT0gJ3VuZGVmaW5lZCcpIHtcclxuICAgICAgY29uc3QgaGFzaCA9IHdpbmRvdy5sb2NhdGlvbi5oYXNoLnN1YnN0cmluZygxKTtcclxuICAgICAgY29uc3QgdGFiSW5kZXggPSB0YWJzUmVmLmN1cnJlbnQuZmluZEluZGV4KFxyXG4gICAgICAgICh0YWIpID0+IHRhYi50aXRsZS50b0xvd2VyQ2FzZSgpLnJlcGxhY2UoLyAvZywgXCItXCIpID09PSBoYXNoXHJcbiAgICAgICk7XHJcbiAgICAgIGlmICh0YWJJbmRleCAhPT0gLTEgJiYgdGFiSW5kZXggIT09IGFjdGl2ZVRhYikge1xyXG4gICAgICAgIHNldEFjdGl2ZVRhYih0YWJJbmRleCk7XHJcbiAgICAgICAgaWYgKG9uQ2hhbmdlKSB7XHJcbiAgICAgICAgICBvbkNoYW5nZSh0YWJzUmVmLmN1cnJlbnRbdGFiSW5kZXhdLnRpdGxlKTtcclxuICAgICAgICB9XHJcbiAgICAgIH1cclxuICAgIH1cclxuICB9LCBbYWN0aXZlVGFiLCBvbkNoYW5nZV0pO1xyXG5cclxuICB1c2VFZmZlY3QoKCkgPT4ge1xyXG4gICAgaWYgKHR5cGVvZiB3aW5kb3cgIT09ICd1bmRlZmluZWQnKSB7XHJcbiAgICAgIGNoZWNrSGFzaCgpO1xyXG4gICAgICB3aW5kb3cuYWRkRXZlbnRMaXN0ZW5lcignaGFzaGNoYW5nZScsIGNoZWNrSGFzaCk7XHJcbiAgICAgIHJldHVybiAoKSA9PiB7XHJcbiAgICAgICAgd2luZG93LnJlbW92ZUV2ZW50TGlzdGVuZXIoJ2hhc2hjaGFuZ2UnLCBjaGVja0hhc2gpO1xyXG4gICAgICB9O1xyXG4gICAgfVxyXG4gIH0sIFtjaGVja0hhc2hdKTtcclxuXHJcbiAgY29uc3QgcmVuZGVyVGFicyA9IHVzZU1lbW8oXHJcbiAgICAoKSA9PiAoKSA9PiB7XHJcbiAgICAgIHJldHVybiB0YWJzUmVmLmN1cnJlbnQubWFwKCh0YWIsIGluZGV4KSA9PiAoXHJcbiAgICAgICAgPGJ1dHRvblxyXG4gICAgICAgICAga2V5PXtpbmRleH1cclxuICAgICAgICAgIG9uQ2xpY2s9eygpID0+IGhhbmRsZVRhYkNsaWNrKGluZGV4KX1cclxuICAgICAgICAgIGNsYXNzTmFtZT17YWN0aXZlVGFiID09PSBpbmRleCA/ICdhY3RpdmUtdGFiJyA6ICcnfVxyXG4gICAgICAgID5cclxuICAgICAgICAgIHt0YWIuaWNvbn1cclxuICAgICAgICAgIHt0YWIudGl0bGV9XHJcbiAgICAgICAgPC9idXR0b24+XHJcbiAgICAgICkpO1xyXG4gICAgfSxcclxuICAgIFtoYW5kbGVUYWJDbGljaywgYWN0aXZlVGFiXVxyXG4gICk7XHJcblxyXG4gIGNvbnN0IHJlbmRlckNvbnRlbnQgPSB1c2VNZW1vKFxyXG4gICAgKCkgPT4gKCkgPT4ge1xyXG4gICAgICByZXR1cm4gdGFic1JlZi5jdXJyZW50W2FjdGl2ZVRhYl0uY29udGVudDtcclxuICAgIH0sXHJcbiAgICBbYWN0aXZlVGFiXVxyXG4gICk7XHJcblxyXG4gIHJldHVybiB7IHJlbmRlclRhYnMsIHJlbmRlckNvbnRlbnQgfTtcclxufVxyXG5cclxuZXhwb3J0IGRlZmF1bHQgdXNlVGFicztcclxuIiwiZXhwb3J0IHsgZGVmYXVsdCBhcyBjdXN0b21Gb250cyB9IGZyb20gJy4uL2Fzc2V0cy9pbWcvY3VzdG9tZm9udHMucG5nJztcclxuZXhwb3J0IHsgZGVmYXVsdCBhcyBmcmVlUHJvIH0gZnJvbSAnLi4vYXNzZXRzL2ltZy9mcmVldnNwcm8ud2VicCc7XHJcbmV4cG9ydCB7IGRlZmF1bHQgYXMgbG9nbyB9IGZyb20gJy4uL2Fzc2V0cy9pbWcvbG9nby5wbmcnO1xyXG5leHBvcnQgeyBkZWZhdWx0IGFzIG9mZmVyT25lIH0gZnJvbSAnLi4vYXNzZXRzL2ltZy9vZmZlci1vbmUucG5nJztcclxuZXhwb3J0IHsgZGVmYXVsdCBhcyBwbHVnaW5zIH0gZnJvbSAnLi4vYXNzZXRzL2ltZy9wbHVnaW5zLnBuZyc7XHJcbmV4cG9ydCB7IGRlZmF1bHQgYXMgc2FsZXNGdW5uZWwgfSBmcm9tICcuLi9hc3NldHMvaW1nL3NhbGVzZnVubmVsLnBuZyc7XHJcbmV4cG9ydCB7IGRlZmF1bHQgYXMgU0VPIH0gZnJvbSAnLi4vYXNzZXRzL2ltZy9TRU8ucG5nJztcclxuZXhwb3J0IHsgZGVmYXVsdCBhcyBHRFBSIH0gZnJvbSAnLi4vYXNzZXRzL2ltZy9HRFBSLnBuZyc7XHJcbmV4cG9ydCB7IGRlZmF1bHQgYXMgc3VwcG9ydCB9IGZyb20gJy4uL2Fzc2V0cy9pbWcvc3VwcG9ydC5wbmcnO1xyXG5leHBvcnQgeyBkZWZhdWx0IGFzIHRoZW1lQ2x1YiB9IGZyb20gJy4uL2Fzc2V0cy9pbWcvdGhlbWVDbHViLnBuZyc7XHJcbmV4cG9ydCB7IGRlZmF1bHQgYXMgdGhlbWVJbnN0YWxsIH0gZnJvbSAnLi4vYXNzZXRzL2ltZy90aGVtZWluc3RhbGwucG5nJztcclxuZXhwb3J0IHsgZGVmYXVsdCBhcyB2aXBTaXRlQ2FyZSB9IGZyb20gJy4uL2Fzc2V0cy9pbWcvdmlwc2l0ZWNhcmUucG5nJztcclxuZXhwb3J0IHsgZGVmYXVsdCBhcyBtYWluRGVtbyB9IGZyb20gJy4uL2Fzc2V0cy9pbWcvbWFpbi1kZW1vLndlYnAnO1xyXG5leHBvcnQgeyBkZWZhdWx0IGFzIGRlbW8yIH0gZnJvbSAnLi4vYXNzZXRzL2ltZy9kZW1vLTIud2VicCc7XHJcbmV4cG9ydCB7IGRlZmF1bHQgYXMgZGVtbzMgfSBmcm9tICcuLi9hc3NldHMvaW1nL2RlbW8tMy53ZWJwJzsiLCJleHBvcnQgeyBkZWZhdWx0IGFzIEljb24gfSBmcm9tICcuL0ljb24nO1xyXG5leHBvcnQgeyBkZWZhdWx0IGFzIFRhYiB9IGZyb20gJy4vVGFiJztcclxuZXhwb3J0IHsgZGVmYXVsdCBhcyBTaWRlYmFyIH0gZnJvbSAnLi9TaWRlYmFyJztcclxuZXhwb3J0IHsgZGVmYXVsdCBhcyBUYWJIZWFkZXIgfSBmcm9tICcuL1RhYkhlYWRlcic7XHJcbmV4cG9ydCB7IGRlZmF1bHQgYXMgQ2FyZCB9IGZyb20gJy4vQ2FyZCc7XHJcbmV4cG9ydCB7IGRlZmF1bHQgYXMgSGVhZGluZyB9IGZyb20gJy4vSGVhZGluZyc7XHJcbmV4cG9ydCB7IGRlZmF1bHQgYXMgT2ZmZXIgfSBmcm9tICcuL09mZmVyJztcclxuIiwiaW1wb3J0IFJlYWN0LCB7IHVzZVN0YXRlLCB1c2VSZWYsIHVzZUVmZmVjdCB9IGZyb20gJ3JlYWN0JztcclxuaW1wb3J0IHsgSWNvbiB9IGZyb20gJy4uLy4uL2NvbXBvbmVudHMnO1xyXG5pbXBvcnQgeyBfXyB9IGZyb20gXCJAd29yZHByZXNzL2kxOG5cIjtcclxuXHJcbmZ1bmN0aW9uIEZBUSgpIHtcclxuICAgIGNvbnN0IGZhcUNvbnRlbnQgPSBbXHJcbiAgICAgICAge1xyXG4gICAgICAgICAgICB0aXRsZTogX18oJ0hvdyB0byBhY3RpdmF0ZSB0aGUgdGhlbWUgbGljZW5zZT8nLCAnY29va2VyeScpLFxyXG4gICAgICAgICAgICBkZXNjcmlwdGlvbjogKFxyXG4gICAgICAgICAgICAgICAgPHA+e19fKCdUbyBhY3RpdmF0ZSB0aGUgdGhlbWUgbGljZW5zZSwgeW91IG5lZWQgdG8gY29weSB0aGUgbGljZW5zZSBrZXkgZnJvbSB5b3VyJywgJ2Nvb2tlcnknKX0gPGEgaHJlZj17Y3dfZGFzaGJvYXJkLmFjY291bnR9IHRhcmdldD1cIl9ibGFua1wiPntfXyhgQmxvc3NvbSBUaGVtZXMnIERhc2hib2FyZGAsICdjb29rZXJ5Jyl9PC9hPiB7X18oYGFuZCBlbnRlciB0aGUga2V5IG9uIHRoZSByaWdodC1oYW5kIHNpZGUgb2YgdGhpcyBwYWdlLiBZb3UgY2FuIGxvZyBpbiB0byB5b3VyIEJsb3Nzb20gVGhlbWVzJyBkYXNoYm9hcmQgdXNpbmcgdGhlIHVzZXJuYW1lIGFuZCBwYXNzd29yZCB0aGF0IHdhcyBzZW50IHRvIHlvdXIgZW1haWwgZHVyaW5nIHRoZSB0aGVtZSBwdXJjaGFzZS5gLCAnY29va2VyeScpfTwvcD5cclxuICAgICAgICAgICAgKVxyXG4gICAgICAgIH0sXHJcbiAgICAgICAge1xyXG4gICAgICAgICAgICB0aXRsZTogX18oJ1doYXQgYXJlIHRoZSBiZW5lZml0cyBvZiBhY3RpdmF0aW5nIHRoZSB0aGVtZSBsaWNlbnNlPycsICdjb29rZXJ5JyksXHJcbiAgICAgICAgICAgIGRlc2NyaXB0aW9uOiAnV2hlbiB5b3UgYWN0aXZhdGUgdGhlIHRoZW1lIGxpY2Vuc2UsIHlvdSBjYW4gZW5qb3kgdGhlIHNlYW1sZXNzIHRoZW1lIHVwZGF0ZXMgYW5kIGZhc3RlciBzdXBwb3J0LiBXZSBzb2x2ZSBjb21wYXRpYmlsaXR5IGlzc3VlcyBhbmQgYnVncywgbWFrZSB0aGUgdGhlbWUgbW9yZSBzZWN1cmUsIGFuZCBzb21ldGltZXMgYWRkIGV4dHJhIGZlYXR1cmVzIHdpdGggdGhlbWUgdXBkYXRlcy4gU28sIGlmIHlvdSB3YW50IHlvdXIgd2Vic2l0ZSB0byBiZSBzYWZlIGFuZCBzZWN1cmUsIHlvdSBzaG91bGQgYWN0aXZhdGUgdGhlIHRoZW1lIGxpY2Vuc2Ugc28gdGhhdCB5b3UgbmV2ZXIgbWlzcyBvdXIgdGhlbWUgdXBkYXRlcy4nXHJcbiAgICAgICAgfSxcclxuICAgICAgICB7XHJcbiAgICAgICAgICAgIHRpdGxlOiBfXygnSG93IHRvIHJlbmV3IHRoZSB0aGVtZSBsaWNlbnNlPycsICdjb29rZXJ5JyksXHJcbiAgICAgICAgICAgIGRlc2NyaXB0aW9uOiAoXHJcbiAgICAgICAgICAgICAgICA8cD5cclxuICAgICAgICAgICAgICAgICAgICB7X18oJ1RoZSB0aGVtZSBsaWNlbnNlIHdpbGwgYmUgYXV0b21hdGljYWxseSByZW5ld2VkLiBZb3Ugd2lsbCByZWNlaXZlIG11bHRpcGxlIHJlbWluZGVycyBpbiB5b3VyIGVtYWlsIGJlZm9yZSB5b3VyIHRoZW1lIGV4cGlyZXMuIElmIHlvdSB3YW50IHRvIGNhbmNlbCB0aGUgYXV0by1yZW5ld2FsLCAnLCAnY29va2VyeScpfTxhIGhyZWY9e2N3X2Rhc2hib2FyZC5zdXBwb3J0fSB0YXJnZXQ9XCJfYmxhbmtcIj57X18oJ3BsZWFzZSBjb250YWN0IHVzLicsICdjb29rZXJ5Jyl9PC9hPlxyXG4gICAgICAgICAgICAgICAgPC9wPlxyXG4gICAgICAgICAgICApXHJcbiAgICAgICAgfSxcclxuICAgICAgICB7XHJcbiAgICAgICAgICAgIHRpdGxlOiBfXygnV2hhdCBhcmUgdGhlIGJlbmVmaXRzIG9mIHVwZ3JhZGluZyB0byB0aGUgVGhlbWUgQ2x1Yj8nLCAnY29va2VyeScpLFxyXG4gICAgICAgICAgICBkZXNjcmlwdGlvbjogKFxyXG4gICAgICAgICAgICAgICAgPHA+XHJcbiAgICAgICAgICAgICAgICAgICAge19fKCdGb3IganVzdCBzbWFsbCBhZGRpdGlvbmFsIGFtb3VudCBvZiBtb25leSwgeW91IHdpbGwgZ2V0IGFjY2VzcyB0byBhbGwgb3VyIGN1cnJlbnQgdGhlbWVzLCBuZXcgdGhlbWUgcmVsZWFzZXMsIHRoZW1lIHVwZGF0ZXMsIGFuZCBlbWFpbCBzdXBwb3J0IHdpdGggdGhlJywgJ2Nvb2tlcnknKX0gPGEgaHJlZj17Y3dfZGFzaGJvYXJkLnRoZW1lX2NsdWJfdXBncmFkZX0gdGFyZ2V0PVwiX2JsYW5rXCI+e19fKCdUaGVtZSBDbHViLicsICdjb29rZXJ5Jyl9PC9hPlxyXG4gICAgICAgICAgICAgICAgPC9wPlxyXG4gICAgICAgICAgICApLFxyXG4gICAgICAgIH0sXHJcbiAgICAgICAge1xyXG4gICAgICAgICAgICB0aXRsZTogX18oJ0hvdyBjYW4gSSB1cGdyYWRlIHRvIHRoZSBUaGVtZSBDbHViPycsICdjb29rZXJ5JyksXHJcbiAgICAgICAgICAgIGRlc2NyaXB0aW9uOiAoXHJcbiAgICAgICAgICAgICAgICA8cD5cclxuICAgICAgICAgICAgICAgICAgICB7X18oJ1RvIHVwZ3JhZGUgdG8gdGhlIFRoZW1lIENsdWIsIHBsZWFzZSBsb2cgaW4gdG8geW91ciAnLCAnY29va2VyeScpfTxhIGhyZWY9e2N3X2Rhc2hib2FyZC5hY2NvdW50fSB0YXJnZXQ9XCJfYmxhbmtcIj57X18oYEJsb3Nzb20gVGhlbWVzJyBEYXNoYm9hcmRgLCAnY29va2VyeScpfTwvYT4ge19fKCd1c2luZyB0aGUgdXNlcm5hbWUgYW5kIHBhc3N3b3JkIGNyZWF0ZWQgZHVyaW5nIHRoZSBwdXJjaGFzZS4gQWZ0ZXIgeW91IGxvZyBpbiwgY2xpY2sgb24gJywgJ2Nvb2tlcnknKX08Yj4ge19fKCdWaWV3IExpY2Vuc2VzJywgJ2Nvb2tlcnknKX0geyc+J30ge19fKCdWaWV3IFVwZ3JhZGVzJywgJ2Nvb2tlcnknKX08L2I+IHtfXygnYW5kIHNlbGVjdCB0aGUnLCAnY29va2VyeScpfSA8Yj4ge19fKCdUaGVtZSBDbHViIFVwZ3JhZGUnLCAnY29va2VyeScpfTwvYj4ge19fKCd5b3Ugd2FudC4nLCAnY29va2VyeScpfVxyXG4gICAgICAgICAgICAgICAgPC9wPlxyXG4gICAgICAgICAgICApXHJcbiAgICAgICAgfSxcclxuICAgICAgICB7XHJcbiAgICAgICAgICAgIHRpdGxlOiBfXygnV2h5IGlzIG15IHRoZW1lIG5vdCB3b3JraW5nIHdlbGw/JywgJ2Nvb2tlcnknKSxcclxuICAgICAgICAgICAgZGVzY3JpcHRpb246IChcclxuICAgICAgICAgICAgICAgIDw+XHJcbiAgICAgICAgICAgICAgICAgICAgPHA+XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIHtfXygnSWYgeW91ciBjdXN0b21pemVyIGlzIG5vdCBsb2FkaW5nIHByb3Blcmx5IG9yIHlvdSBhcmUgaGF2aW5nIGlzc3VlcyB3aXRoIHRoZSB0aGVtZSwgaXQgbWlnaHQgYmUgZHVlIHRvIHRoZSBwbHVnaW4gY29uZmxpY3QuJywgJ2Nvb2tlcnknKX1cclxuICAgICAgICAgICAgICAgICAgICA8L3A+XHJcbiAgICAgICAgICAgICAgICAgICAgPHA+XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIHtfXygnVG8gc29sdmUgdGhlIGlzc3VlLCBkZWFjdGl2YXRlIGFsbCB0aGUgcGx1Z2lucyBmaXJzdCwgZXhjZXB0IHRoZSBvbmVzIHJlY29tbWVuZGVkIGJ5IHRoZSB0aGVtZS4gVGhlbiwgaGFyZCByZWxvYWQgeW91ciB3ZWJzaXRlIHVzaW5nICcsICdjb29rZXJ5Jyl9PGI+e19fKGBcIkN0cmwrU2hpZnQrUlwiYCwgJ2Nvb2tlcnknKX08L2I+IHtfXygnb24gV2luZG93cy4gSWYgdGhlIGlzc3VlcyBhcmUgZml4ZWQsIHN0YXJ0IGFjdGl2YXRpbmcgdGhlIHBsdWdpbnMgb25lIGJ5IG9uZSwgYW5kIHJlbG9hZCBhbmQgY2hlY2sgeW91ciBzaXRlIGVhY2ggdGltZS4gVGhpcyB3aWxsIGhlbHAgeW91IGZpbmQgb3V0IHRoZSBwbHVnaW4gdGhhdCBpcyBjYXVzaW5nIHRoZSBwcm9ibGVtLicsICdjb29rZXJ5Jyl9XHJcbiAgICAgICAgICAgICAgICAgICAgPC9wPlxyXG4gICAgICAgICAgICAgICAgICAgIDxwPlxyXG4gICAgICAgICAgICAgICAgICAgICAgICB7X18oYElmIHRoaXMgZGlkbid0IGhlbHAsIHBsZWFzZWAsICdjb29rZXJ5Jyl9IDxhIGhyZWY9e2N3X2Rhc2hib2FyZC5zdXBwb3J0fSB0YXJnZXQ9XCJfYmxhbmtcIj57X18oJ2NvbnRhY3QgdXMuJywgJ2Nvb2tlcnknKX08L2E+XHJcbiAgICAgICAgICAgICAgICAgICAgPC9wPlxyXG4gICAgICAgICAgICAgICAgPC8+XHJcblxyXG4gICAgICAgICAgICApXHJcbiAgICAgICAgfSxcclxuICAgICAgICB7XHJcbiAgICAgICAgICAgIHRpdGxlOiBfXygnSG93IGNhbiBJIHNvbHZlIG15IGlzc3VlcyBxdWlja2x5IGFuZCBnZXQgZmFzdGVyIHN1cHBvcnQ/JywgJ2Nvb2tlcnknKSxcclxuICAgICAgICAgICAgZGVzY3JpcHRpb246IChcclxuICAgICAgICAgICAgICAgIDw+XHJcbiAgICAgICAgICAgICAgICAgICAgPHA+XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIHtfXygnQmVmb3JlIHlvdSBzZW5kIHVzIGEgc3VwcG9ydCB0aWNrZXQgZm9yIGFueSBpc3N1ZXMsIHBsZWFzZSBtYWtlIHN1cmUgeW91IGhhdmUgdXBkYXRlZCB0aGUgdGhlbWUgdG8gdGhlIGxhdGVzdCB2ZXJzaW9uLiBXZSBtaWdodCBoYXZlIGZpeGVkIHRoZSBidWcgaW4gdGhlIHRoZW1lIHVwZGF0ZS4nLCAnY29va2VyeScpfVxyXG4gICAgICAgICAgICAgICAgICAgIDwvcD5cclxuICAgICAgICAgICAgICAgICAgICA8cD5cclxuICAgICAgICAgICAgICAgICAgICAgICAge19fKGBXaGVuIHlvdSBzdWJtaXQgdGhlIHN1cHBvcnQgdGlja2V0LCBwbGVhc2UgdHJ5IHRvIHByb3ZpZGUgYXMgbXVjaCBkZXRhaWxzIGFzIHBvc3NpYmxlIHNvIHRoYXQgd2UgY2FuIHNvbHZlIHlvdXIgcHJvYmxlbSBmYXN0ZXIuIFdlIHJlY29tbWVuZCB5b3UgdG8gc2VuZCB1cyBhIHNjcmVlbnNob3Qocykgd2l0aCBpc3N1ZXMgZXhwbGFpbmVkIGFuZCB5b3VyIHdlYnNpdGUncyBhZGRyZXNzIChVUkwpLllvdSBjYW4gY29udGFjdCB1cyBgLCAnY29va2VyeScpfTxhIGhyZWY9e2N3X2Rhc2hib2FyZC5zdXBwb3J0fSB0YXJnZXQ9XCJfYmxhbmtcIj57X18oJ2hlcmUuJywgJ2Nvb2tlcnknKX08L2E+XHJcbiAgICAgICAgICAgICAgICAgICAgPC9wPlxyXG4gICAgICAgICAgICAgICAgICAgIDxwPlxyXG4gICAgICAgICAgICAgICAgICAgICAgICB7X18oJ0Fsc28sIHlvdSBtaWdodCBleHBlcmllbmNlIGEgc2xvd2VyIHJlc3BvbnNlIHRpbWUgZHVyaW5nIHRoZSB3ZWVrZW5kLCBzbyBwbGVhc2UgYmVhciB3aXRoIHVzLicsICdjb29rZXJ5Jyl9XHJcbiAgICAgICAgICAgICAgICAgICAgPC9wPlxyXG4gICAgICAgICAgICAgICAgPC8+XHJcbiAgICAgICAgICAgIClcclxuICAgICAgICB9XHJcbiAgICBdO1xyXG5cclxuICAgIGNvbnN0IFtvcGVuSW5kZXgsIHNldE9wZW5JbmRleF0gPSB1c2VTdGF0ZSgwKTtcclxuICAgIGNvbnN0IFtoZWlnaHQsIHNldEhlaWdodF0gPSB1c2VTdGF0ZSgnMHB4Jyk7XHJcbiAgICBjb25zdCBjb250ZW50UmVmID0gdXNlUmVmKG51bGwpO1xyXG5cclxuICAgIHVzZUVmZmVjdCgoKSA9PiB7XHJcbiAgICAgICAgc2V0SGVpZ2h0KG9wZW5JbmRleCAhPT0gLTEgPyBgJHtjb250ZW50UmVmLmN1cnJlbnQuc2Nyb2xsSGVpZ2h0fXB4YCA6ICcwcHgnKTtcclxuICAgIH0sIFtvcGVuSW5kZXhdKTtcclxuXHJcbiAgICBjb25zdCB0b2dnbGVEZXNjcmlwdGlvbiA9IChpbmRleCkgPT4ge1xyXG4gICAgICAgIHNldE9wZW5JbmRleChpbmRleCA9PT0gb3BlbkluZGV4ID8gLTEgOiBpbmRleCk7XHJcbiAgICB9O1xyXG5cclxuICAgIHJldHVybiAoXHJcbiAgICAgICAgPD5cclxuICAgICAgICAgICAge2ZhcUNvbnRlbnQubWFwKChjb250ZW50LCBpbmRleCkgPT4gKFxyXG4gICAgICAgICAgICAgICAgPGRpdiBjbGFzc05hbWU9XCJmYXEtaXRlbVwiIGtleT17aW5kZXh9PlxyXG4gICAgICAgICAgICAgICAgICAgIDxkaXYgY2xhc3NOYW1lPVwiZmFxLXRpdGxlXCIgb25DbGljaz17KCkgPT4gdG9nZ2xlRGVzY3JpcHRpb24oaW5kZXgpfT5cclxuICAgICAgICAgICAgICAgICAgICAgICAgPGgyPntjb250ZW50LnRpdGxlfTwvaDI+XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIDxzcGFuPjxJY29uIGljb249e29wZW5JbmRleCA9PT0gaW5kZXggPyAnbWludXMnIDogJ3BsdXMnfSAvPjwvc3Bhbj5cclxuICAgICAgICAgICAgICAgICAgICA8L2Rpdj5cclxuICAgICAgICAgICAgICAgICAgICA8ZGl2XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGNsYXNzTmFtZT1cImZhcS1kZXNjcmlwdGlvblwiXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIHJlZj17b3BlbkluZGV4ID09PSBpbmRleCA/IGNvbnRlbnRSZWYgOiBudWxsfVxyXG4gICAgICAgICAgICAgICAgICAgICAgICBzdHlsZT17e1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgbWF4SGVpZ2h0OiBvcGVuSW5kZXggPT09IGluZGV4ID8gaGVpZ2h0IDogJzBweCcsXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBvdmVyZmxvdzogJ2hpZGRlbicsXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICB0cmFuc2l0aW9uOiAnbWF4LWhlaWdodCAwLjVzIGVhc2UnLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICB9fVxyXG4gICAgICAgICAgICAgICAgICAgID5cclxuICAgICAgICAgICAgICAgICAgICAgICAge3R5cGVvZiBjb250ZW50LmRlc2NyaXB0aW9uID09PSAnc3RyaW5nJyA/IDxwPntjb250ZW50LmRlc2NyaXB0aW9ufTwvcD4gOiBjb250ZW50LmRlc2NyaXB0aW9ufVxyXG4gICAgICAgICAgICAgICAgICAgIDwvZGl2PlxyXG4gICAgICAgICAgICAgICAgPC9kaXY+XHJcbiAgICAgICAgICAgICkpfVxyXG4gICAgICAgIDwvPlxyXG4gICAgKTtcclxufVxyXG5cclxuZXhwb3J0IGRlZmF1bHQgRkFRO1xyXG4iLCJpbXBvcnQgeyBJY29uLCBTaWRlYmFyLCBDYXJkLCBIZWFkaW5nIH0gZnJvbSBcIi4uLy4uL2NvbXBvbmVudHNcIjtcclxuaW1wb3J0IHsgX18gfSBmcm9tICdAd29yZHByZXNzL2kxOG4nO1xyXG5cclxuY29uc3QgSG9tZXBhZ2UgPSAoKSA9PiB7XHJcbiAgICBjb25zdCBjYXJkTGlzdHMgPSBbXHJcbiAgICAgICAge1xyXG4gICAgICAgICAgICBpY29uU3ZnOiA8SWNvbiBpY29uPVwic2l0ZVwiIC8+LFxyXG4gICAgICAgICAgICBoZWFkaW5nOiBfXygnU2l0ZSBJZGVudGl0eScsICdjb29rZXJ5JyksXHJcbiAgICAgICAgICAgIGJ1dHRvblRleHQ6IF9fKCdDdXN0b21pemUnLCAnY29va2VyeScpLFxyXG4gICAgICAgICAgICBidXR0b25Vcmw6IGN3X2Rhc2hib2FyZC5jdXN0b21fbG9nb1xyXG4gICAgICAgIH0sXHJcbiAgICAgICAge1xyXG4gICAgICAgICAgICBpY29uU3ZnOiA8SWNvbiBpY29uPVwiY29sb3JzZXR0aW5nXCIgLz4sXHJcbiAgICAgICAgICAgIGhlYWRpbmc6IF9fKFwiQ29sb3IgU2V0dGluZ3NcIiwgJ2Nvb2tlcnknKSxcclxuICAgICAgICAgICAgYnV0dG9uVGV4dDogX18oJ0N1c3RvbWl6ZScsICdjb29rZXJ5JyksXHJcbiAgICAgICAgICAgIGJ1dHRvblVybDogY3dfZGFzaGJvYXJkLmNvbG9yc1xyXG4gICAgICAgIH0sXHJcbiAgICAgICAge1xyXG4gICAgICAgICAgICBpY29uU3ZnOiA8SWNvbiBpY29uPVwidHlwb2dyYXBoeXNldHRpbmdcIiAvPixcclxuICAgICAgICAgICAgaGVhZGluZzogX18oXCJUeXBvZ3JhcGh5IFNldHRpbmdzXCIsICdjb29rZXJ5JyksXHJcbiAgICAgICAgICAgIGJ1dHRvblRleHQ6IF9fKCdDdXN0b21pemUnLCAnY29va2VyeScpLFxyXG4gICAgICAgICAgICBidXR0b25Vcmw6IGN3X2Rhc2hib2FyZC50eXBvZ3JhcGh5XHJcbiAgICAgICAgfSxcclxuICAgICAgICB7XHJcbiAgICAgICAgICAgIGljb25Tdmc6IDxJY29uIGljb249XCJsYXlvdXRzZXR0aW5nXCIgLz4sXHJcbiAgICAgICAgICAgIGhlYWRpbmc6IF9fKFwiTGF5b3V0IFNldHRpbmdzXCIsICdjb29rZXJ5JyksXHJcbiAgICAgICAgICAgIGJ1dHRvblRleHQ6IF9fKCdDdXN0b21pemUnLCAnY29va2VyeScpLFxyXG4gICAgICAgICAgICBidXR0b25Vcmw6IGN3X2Rhc2hib2FyZC5sYXlvdXRcclxuICAgICAgICB9LFxyXG4gICAgICAgIHtcclxuICAgICAgICAgICAgaWNvblN2ZzogPEljb24gaWNvbj1cImZyb250cGFnZXNldHRpbmdcIiAvPixcclxuICAgICAgICAgICAgaGVhZGluZzogX18oXCJQZXJmb3JtYW5jZSBTZXR0aW5nc1wiLCAnY29va2VyeScpLFxyXG4gICAgICAgICAgICBidXR0b25UZXh0OiBfXygnQ3VzdG9taXplJywgJ2Nvb2tlcnknKSxcclxuICAgICAgICAgICAgYnV0dG9uVXJsOiBjd19kYXNoYm9hcmQucGVyZm9ybWFuY2VcclxuICAgICAgICB9LFxyXG4gICAgICAgIHtcclxuICAgICAgICAgICAgaWNvblN2ZzogPEljb24gaWNvbj1cImZyb250cGFnZXNldHRpbmdcIiAvPixcclxuICAgICAgICAgICAgaGVhZGluZzogX18oXCJGcm9udHBhZ2UgU2V0dGluZ3NcIiwgJ2Nvb2tlcnknKSxcclxuICAgICAgICAgICAgYnV0dG9uVGV4dDogX18oJ0N1c3RvbWl6ZScsICdjb29rZXJ5JyksXHJcbiAgICAgICAgICAgIGJ1dHRvblVybDogY3dfZGFzaGJvYXJkLmZyb250XHJcbiAgICAgICAgfSxcclxuICAgICAgICB7XHJcbiAgICAgICAgICAgIGljb25Tdmc6IDxJY29uIGljb249XCJnZW5lcmFsc2V0dGluZ1wiIC8+LFxyXG4gICAgICAgICAgICBoZWFkaW5nOiBfXyhcIkdlbmVyYWwgU2V0dGluZ3NcIiwgJ2Nvb2tlcnknKSxcclxuICAgICAgICAgICAgYnV0dG9uVGV4dDogX18oJ0N1c3RvbWl6ZScsICdjb29rZXJ5JyksXHJcbiAgICAgICAgICAgIGJ1dHRvblVybDogY3dfZGFzaGJvYXJkLmdlbmVyYWxcclxuICAgICAgICB9LFxyXG4gICAgICAgIHtcclxuICAgICAgICAgICAgaWNvblN2ZzogPEljb24gaWNvbj1cInNpZGViYXJcIiAvPixcclxuICAgICAgICAgICAgaGVhZGluZzogX18oXCJTaWRlYmFyXCIsICdjb29rZXJ5JyksXHJcbiAgICAgICAgICAgIGJ1dHRvblRleHQ6IF9fKCdDdXN0b21pemUnLCAnY29va2VyeScpLFxyXG4gICAgICAgICAgICBidXR0b25Vcmw6IGN3X2Rhc2hib2FyZC5zaWRlYmFyXHJcbiAgICAgICAgfSxcclxuICAgICAgICB7XHJcbiAgICAgICAgICAgIGljb25Tdmc6IDxJY29uIGljb249XCJmb290ZXJzZXR0aW5nXCIgLz4sXHJcbiAgICAgICAgICAgIGhlYWRpbmc6IF9fKCdGb290ZXIgU2V0dGluZ3MnLCAnY29va2VyeScpLFxyXG4gICAgICAgICAgICBidXR0b25UZXh0OiBfXygnQ3VzdG9taXplJywgJ2Nvb2tlcnknKSxcclxuICAgICAgICAgICAgYnV0dG9uVXJsOiBjd19kYXNoYm9hcmQuZm9vdGVyXHJcbiAgICAgICAgfVxyXG4gICAgXTtcclxuXHJcbiAgICBjb25zdCBzaWRlYmFyU2V0dGluZ3MgPSBbXHJcbiAgICAgICAge1xyXG4gICAgICAgICAgICBoZWFkaW5nOiBfXygnV2UgVmFsdWUgWW91ciBGZWVkYmFjayEnLCAnY29va2VyeScpLFxyXG4gICAgICAgICAgICBpY29uOiBcInN0YXJcIixcclxuICAgICAgICAgICAgcGFyYTogX18oXCJZb3VyIHJldmlldyBoZWxwcyB1cyBpbXByb3ZlIGFuZCBhc3Npc3RzIG90aGVycyBpbiBtYWtpbmcgaW5mb3JtZWQgY2hvaWNlcy4gU2hhcmUgeW91ciB0aG91Z2h0cyB0b2RheSFcIiwgJ2Nvb2tlcnknKSxcclxuICAgICAgICAgICAgaW1hZ2V1cmw6IDxJY29uIGljb249XCJyZXZpZXdcIiAvPixcclxuICAgICAgICAgICAgYnV0dG9uVGV4dDogX18oJ0xlYXZlIGEgUmV2aWV3JywgJ2Nvb2tlcnknKSxcclxuICAgICAgICAgICAgYnV0dG9uVXJsOiBjd19kYXNoYm9hcmQucmV2aWV3XHJcbiAgICAgICAgfSxcclxuICAgICAgICB7XHJcbiAgICAgICAgICAgIGhlYWRpbmc6IF9fKCdLbm93bGVkZ2UgQmFzZScsICdjb29rZXJ5JyksXHJcbiAgICAgICAgICAgIHBhcmE6IF9fKFwiTmVlZCBoZWxwIHVzaW5nIG91ciB0aGVtZT8gVmlzaXQgb3VyIHdlbGwtb3JnYW5pemVkIEtub3dsZWRnZSBCYXNlIVwiLCAnY29va2VyeScpLFxyXG4gICAgICAgICAgICBpbWFnZXVybDogPEljb24gaWNvbj1cImRvY3VtZW50YXRpb25cIiAvPixcclxuICAgICAgICAgICAgYnV0dG9uVGV4dDogX18oJ0V4cGxvcmUnLCAnY29va2VyeScpLFxyXG4gICAgICAgICAgICBidXR0b25Vcmw6IGN3X2Rhc2hib2FyZC5kb2NtZW50YXRpb25cclxuICAgICAgICB9LFxyXG4gICAgICAgIHtcclxuICAgICAgICAgICAgaGVhZGluZzogX18oJ05lZWQgQXNzaXN0YW5jZT8gJywgJ2Nvb2tlcnknKSxcclxuICAgICAgICAgICAgcGFyYTogX18oXCJJZiB5b3UgbmVlZCBoZWxwIG9yIGhhdmUgYW55IHF1ZXN0aW9ucywgZG9uJ3QgaGVzaXRhdGUgdG8gY29udGFjdCBvdXIgc3VwcG9ydCB0ZWFtLiBXZSdyZSBoZXJlIHRvIGFzc2lzdCB5b3UhXCIsICdjb29rZXJ5JyksXHJcbiAgICAgICAgICAgIGltYWdldXJsOiA8SWNvbiBpY29uPVwic3VwcG9ydFR3b1wiIC8+LFxyXG4gICAgICAgICAgICBidXR0b25UZXh0OiBfXygnU3VibWl0IGEgVGlja2V0JywgJ2Nvb2tlcnknKSxcclxuICAgICAgICAgICAgYnV0dG9uVXJsOiBjd19kYXNoYm9hcmQuc3VwcG9ydFxyXG4gICAgICAgIH1cclxuICAgIF07XHJcbiAgICByZXR1cm4gKFxyXG4gICAgICAgIDw+XHJcbiAgICAgICAgICAgIDxkaXYgY2xhc3NOYW1lPVwiY3VzdG9taXplci1zZXR0aW5nc1wiPlxyXG4gICAgICAgICAgICAgICAgPGRpdiBjbGFzc05hbWU9XCJjdy1jdXN0b21pemVyXCI+XHJcbiAgICAgICAgICAgICAgICAgICAgPGRpdiBjbGFzc05hbWU9XCJ2aWRlby1zZWN0aW9uXCI+XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIDxkaXYgY2xhc3NOYW1lPVwiY3ctc2V0dGluZ3NcIj5cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIDxoMj57X18oJ0Nvb2tlcnkgVHV0b3JpYWwnLCAnY29va2VyeScpfTwvaDI+XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIDwvZGl2PlxyXG4gICAgICAgICAgICAgICAgICAgICAgICA8aWZyYW1lIHNyYz1cImh0dHBzOi8vd3d3LnlvdXR1YmUuY29tL2VtYmVkL1h2X2hKVHV4NWtRP3NpPTZ1YVgyMGE2cmxYWG1MaUxcIiB0aXRsZT17X18oICdIb3cgdG8gU3RhcnQgQSBGb29kIEJsb2cgU3RlcCBieSBTdGVwIEluIDIwMjMgfCBDb29rZXJ5IFR1dG9yaWFsJywgJ2Jsb3Nzb20tdHJhdmVrJyApfSBmcmFtZUJvcmRlcj1cIjBcIiBhbGxvdz1cImFjY2VsZXJvbWV0ZXI7IGF1dG9wbGF5OyBjbGlwYm9hcmQtd3JpdGU7IGVuY3J5cHRlZC1tZWRpYTsgZ3lyb3Njb3BlOyBwaWN0dXJlLWluLXBpY3R1cmU7IHdlYi1zaGFyZVwiIHJlZmVycmVyUG9saWN5PVwic3RyaWN0LW9yaWdpbi13aGVuLWNyb3NzLW9yaWdpblwiIGFsbG93RnVsbFNjcmVlbj48L2lmcmFtZT5cclxuICAgICAgICAgICAgICAgICAgICA8L2Rpdj5cclxuICAgICAgICAgICAgICAgICAgICA8SGVhZGluZ1xyXG4gICAgICAgICAgICAgICAgICAgICAgICBoZWFkaW5nPXtfXygnUXVpY2sgQ3VzdG9taXplciBTZXR0aW5ncycsICdjb29rZXJ5Jyl9XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGJ1dHRvblRleHQ9e19fKCdHbyBUbyBDdXN0b21pemVyJywgJ2Nvb2tlcnknKX1cclxuICAgICAgICAgICAgICAgICAgICAgICAgYnV0dG9uVXJsPXtjd19kYXNoYm9hcmQ/LmN1c3RvbWl6ZXJfdXJsfVxyXG4gICAgICAgICAgICAgICAgICAgICAgICBvcGVuSW5OZXdUYWI9e3RydWV9XHJcbiAgICAgICAgICAgICAgICAgICAgLz5cclxuICAgICAgICAgICAgICAgICAgICA8Q2FyZFxyXG4gICAgICAgICAgICAgICAgICAgICAgICBjYXJkTGlzdD17Y2FyZExpc3RzfVxyXG4gICAgICAgICAgICAgICAgICAgICAgICBjYXJkUGxhY2U9J2N1c3RvbWl6ZXInXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGNhcmRDb2w9J3RocmVlLWNvbCdcclxuICAgICAgICAgICAgICAgICAgICAvPlxyXG4gICAgICAgICAgICAgICAgPC9kaXY+XHJcbiAgICAgICAgICAgICAgICA8U2lkZWJhciBzaWRlYmFyU2V0dGluZ3M9e3NpZGViYXJTZXR0aW5nc30gb3BlbkluTmV3VGFiPXt0cnVlfSAvPlxyXG4gICAgICAgICAgICA8L2Rpdj5cclxuICAgICAgICA8Lz5cclxuICAgICk7XHJcbn1cclxuXHJcbmV4cG9ydCBkZWZhdWx0IEhvbWVwYWdlOyIsImltcG9ydCB7IF9fLCBzcHJpbnRmIH0gZnJvbSBcIkB3b3JkcHJlc3MvaTE4blwiO1xyXG5pbXBvcnQgeyB1c2VTdGF0ZSwgdXNlRWZmZWN0IH0gZnJvbSAnQHdvcmRwcmVzcy9lbGVtZW50JztcclxuaW1wb3J0IHsgSWNvbiB9IGZyb20gXCIuLi8uLi9jb21wb25lbnRzXCI7XHJcbmltcG9ydCB7IFNwaW5uZXIgfSBmcm9tICdAd29yZHByZXNzL2NvbXBvbmVudHMnO1xyXG5pbXBvcnQgeyB0b2FzdCB9IGZyb20gXCJzb25uZXJcIjtcclxuXHJcbmNvbnN0IExpY2Vuc2UgPSAoKSA9PiB7XHJcblx0Y29uc3QgW3Nob3dQYXNzd29yZCwgc2V0U2hvd1Bhc3N3b3JkXSA9IHVzZVN0YXRlKGZhbHNlKTtcclxuXHRjb25zdCBbbGljZW5zZUtleSwgc2V0TGljZW5zZUtleV0gPSB1c2VTdGF0ZSgnJyk7XHJcblx0Y29uc3QgW2lzQVBJSk9CLCBzZXRJc0FQSUpPQl0gPSB1c2VTdGF0ZShmYWxzZSk7XHJcblx0Y29uc3QgW3NhdmVkTGljZW5zZSwgc2V0U2F2ZWRMaWNlbnNlXSA9IHVzZVN0YXRlKGZhbHNlKTtcclxuXHRjb25zdCBbbGljZW5zZVN0YXR1cywgc2V0TGljZW5zZVN0YXR1c10gPSB1c2VTdGF0ZSh7XHJcblx0XHRzdGF0dXM6IFwiXCIsXHJcblx0XHRtZXNzYWdlOiBcIlwiXHJcblx0fSk7XHJcblx0Y29uc3QgW2lzTG9hZGluZywgc2V0aXNMb2FkaW5nXSA9IHVzZVN0YXRlKGZhbHNlKTtcclxuXHJcblx0Y29uc3QgYWN0aXZhdGVMaWNlbnNlID0gKGUpID0+IHtcclxuXHRcdHNldElzQVBJSk9CKHRydWUpO1xyXG5cdFx0ZmV0Y2goXHJcblx0XHRcdGAke2N3X2Rhc2hib2FyZC5hamF4X3VybH0/YWN0aW9uPWNwX2NvbnRyb2xfYWN0aXZhdGVfbGljZW5zZSZzZWN1cml0eT0ke2N3X2Rhc2hib2FyZC5MaWNlbnNlTm9uY2V9JmNwTGljZW5zZUtleT0ke2xpY2Vuc2VLZXl9YCxcclxuXHRcdFx0e1xyXG5cdFx0XHRcdGhlYWRlcnM6IHtcclxuXHRcdFx0XHRcdEFjY2VwdDogJ2FwcGxpY2F0aW9uL2pzb24nLFxyXG5cdFx0XHRcdFx0J0NvbnRlbnQtVHlwZSc6ICdhcHBsaWNhdGlvbi9qc29uJyxcclxuXHRcdFx0XHRcdCdYLVdQLU5PTkNFJzogY3dfZGFzaGJvYXJkLkxpY2Vuc2VOb25jZVxyXG5cdFx0XHRcdH0sXHJcblx0XHRcdFx0bWV0aG9kOiAnUE9TVCcsXHJcblx0XHRcdFx0Ym9keTogSlNPTi5zdHJpbmdpZnkoe1xyXG5cdFx0XHRcdFx0c2VjdXJpdHk6IGN3X2Rhc2hib2FyZC5MaWNlbnNlTm9uY2UsXHJcblx0XHRcdFx0XHRsaWNlbnNlS2V5OiBsaWNlbnNlS2V5XHJcblx0XHRcdFx0fSksXHJcblx0XHRcdH1cclxuXHRcdClcclxuXHRcdFx0LnRoZW4oKHIpID0+IHIuanNvbigpKVxyXG5cdFx0XHQudGhlbigocikgPT4ge1xyXG5cdFx0XHRcdGlmIChyLnN1Y2Nlc3MpIHtcclxuXHRcdFx0XHRcdHNldExpY2Vuc2VLZXkoci5kYXRhLmxpY2Vuc2UpO1xyXG5cdFx0XHRcdFx0c2V0TGljZW5zZVN0YXR1cyhyLmRhdGEuc3RhdHVzKTtcclxuXHRcdFx0XHRcdCcnICE9IHIuZGF0YS5saWNlbnNlID8gc2V0U2F2ZWRMaWNlbnNlKHRydWUpIDogc2V0U2F2ZWRMaWNlbnNlKGZhbHNlKTtcclxuXHRcdFx0XHRcdHRvYXN0LnN1Y2Nlc3MoX18oJ0xpY2Vuc2UgYWN0aXZhdGlvbiBjb21wbGV0ZWQgc3VjY2Vzc2Z1bGx5LicsICdjb29rZXJ5JykpXHJcblx0XHRcdFx0fSBlbHNlIGlmICghci5zdWNjZXNzKSB7XHJcblx0XHRcdFx0XHQnJyAhPSByLmRhdGEubGljZW5zZSA/IHNldFNhdmVkTGljZW5zZSh0cnVlKSA6IHNldFNhdmVkTGljZW5zZShmYWxzZSk7XHJcblx0XHRcdFx0XHRzZXRMaWNlbnNlU3RhdHVzKHIuZGF0YS5zdGF0dXMpO1xyXG5cdFx0XHRcdFx0dG9hc3QuZXJyb3IoX18oJ0Vycm9yOiBMaWNlbnNlIGFjdGl2YXRpb24gZmFpbGVkLicsICdjb29rZXJ5JykpXHJcblx0XHRcdFx0fVxyXG5cdFx0XHRcdHNldElzQVBJSk9CKGZhbHNlKTtcclxuXHRcdFx0fSlcclxuXHJcblx0fVxyXG5cclxuXHRjb25zdCBkZUFjdGl2YXRlTGljZW5zZSA9ICgpID0+IHtcclxuXHRcdHNldElzQVBJSk9CKHRydWUpO1xyXG5cdFx0ZmV0Y2goXHJcblx0XHRcdGAke2N3X2Rhc2hib2FyZC5hamF4X3VybH0/YWN0aW9uPWNwX2NvbnRyb2xfZGVhY3RpdmF0ZV9saWNlbnNlYCxcclxuXHRcdFx0e1xyXG5cdFx0XHRcdGhlYWRlcnM6IHtcclxuXHRcdFx0XHRcdEFjY2VwdDogJ2FwcGxpY2F0aW9uL2pzb24nLFxyXG5cdFx0XHRcdFx0J0NvbnRlbnQtVHlwZSc6ICdhcHBsaWNhdGlvbi9qc29uJyxcclxuXHRcdFx0XHR9LFxyXG5cdFx0XHRcdG1ldGhvZDogJ1BPU1QnLFxyXG5cdFx0XHR9XHJcblx0XHQpXHJcblx0XHRcdC50aGVuKChyKSA9PiByLmpzb24oKSlcclxuXHRcdFx0LnRoZW4oKHIpID0+IHtcclxuXHRcdFx0XHRpZiAoci5zdWNjZXNzKSB7XHJcblx0XHRcdFx0XHRzZXRMaWNlbnNlS2V5KHIuZGF0YS5saWNlbnNlKTtcclxuXHRcdFx0XHRcdHNldExpY2Vuc2VTdGF0dXMoci5kYXRhLnN0YXR1cyk7XHJcblx0XHRcdFx0XHR0b2FzdC5zdWNjZXNzKF9fKCdMaWNlbnNlIGRlYWN0aXZhdGlvbiBjb21wbGV0ZWQgc3VjY2Vzc2Z1bGx5LicsICdjb29rZXJ5JykpXHJcblx0XHRcdFx0fVxyXG5cdFx0XHRcdHNldElzQVBJSk9CKGZhbHNlKTtcclxuXHRcdFx0fSlcclxuXHR9XHJcblxyXG5cdHVzZUVmZmVjdCgoKSA9PiB7XHJcblx0XHRzZXRpc0xvYWRpbmcodHJ1ZSk7XHJcblx0XHRmZXRjaChcclxuXHRcdFx0YCR7Y3dfZGFzaGJvYXJkLmFqYXhfdXJsfT9hY3Rpb249Y3BfZ2V0X2xpY2Vuc2Vfc3RhdHVzYCxcclxuXHRcdFx0e1xyXG5cdFx0XHRcdGhlYWRlcnM6IHtcclxuXHRcdFx0XHRcdEFjY2VwdDogJ2FwcGxpY2F0aW9uL2pzb24nLFxyXG5cdFx0XHRcdFx0J0NvbnRlbnQtVHlwZSc6ICdhcHBsaWNhdGlvbi9qc29uJyxcclxuXHRcdFx0XHR9LFxyXG5cdFx0XHRcdG1ldGhvZDogJ1BPU1QnLFxyXG5cdFx0XHR9XHJcblx0XHQpXHJcblx0XHRcdC50aGVuKChyKSA9PiByLmpzb24oKSlcclxuXHRcdFx0LnRoZW4oKHIpID0+IHtcclxuXHRcdFx0XHRzZXRMaWNlbnNlS2V5KHIuZGF0YS5saWNlbnNlKVxyXG5cdFx0XHRcdHNldExpY2Vuc2VTdGF0dXMoci5kYXRhLnN0YXR1cyk7XHJcblx0XHRcdFx0aWYgKCcnICE9PSByLmRhdGEubGljZW5zZSkge1xyXG5cdFx0XHRcdFx0c2V0U2F2ZWRMaWNlbnNlKHRydWUpO1xyXG5cdFx0XHRcdH1cclxuXHRcdFx0XHRzZXRpc0xvYWRpbmcoZmFsc2UpO1xyXG5cdFx0XHR9KVxyXG5cdH0sIFtzYXZlZExpY2Vuc2VdKTtcclxuXHJcblx0Y29uc3QgaGFuZGxlU2hvd1Bhc3N3b3JkID0gKCkgPT4ge1xyXG5cdFx0c2V0U2hvd1Bhc3N3b3JkKCFzaG93UGFzc3dvcmQpO1xyXG5cdH07XHJcblxyXG5cdGNvbnN0IGhhbmRsZVJlc2V0TGljZW5zZSA9ICgpID0+IHtcclxuXHRcdHNldGlzTG9hZGluZyh0cnVlKTtcclxuXHRcdGZldGNoKFxyXG5cdFx0XHRgJHtjd19kYXNoYm9hcmQuYWpheF91cmx9P2FjdGlvbj1jcF9yZXNldF9saWNlbnNlX3N0YXR1c2AsXHJcblx0XHRcdHtcclxuXHRcdFx0XHRoZWFkZXJzOiB7XHJcblx0XHRcdFx0XHRBY2NlcHQ6ICdhcHBsaWNhdGlvbi9qc29uJyxcclxuXHRcdFx0XHRcdCdDb250ZW50LVR5cGUnOiAnYXBwbGljYXRpb24vanNvbicsXHJcblx0XHRcdFx0fSxcclxuXHRcdFx0XHRtZXRob2Q6ICdQT1NUJyxcclxuXHRcdFx0fVxyXG5cdFx0KVxyXG5cdFx0XHQudGhlbigocikgPT4ge1xyXG5cdFx0XHRcdHNldFNhdmVkTGljZW5zZShmYWxzZSk7XHJcblx0XHRcdFx0c2V0aXNMb2FkaW5nKGZhbHNlKTtcclxuXHRcdFx0fSlcclxuXHR9O1xyXG5cclxuXHRyZXR1cm4gKFxyXG5cdFx0PD5cclxuXHRcdFx0PGRpdiBjbGFzc05hbWU9XCJjdy1saWNlbnNlLXdyYXBwZXJcIj5cclxuXHRcdFx0XHQ8aDIgY2xhc3NOYW1lPVwidGl0bGVcIj5cclxuXHRcdFx0XHRcdHtfXyhgQWN0aXZhdGUgJHtjd19kYXNoYm9hcmQuYmxvZ19uYW1lfSBMaWNlbnNlYCwgXCJjb29rZXJ5XCIpfVxyXG5cdFx0XHRcdDwvaDI+XHJcblx0XHRcdFx0PGRpdiBkYW5nZXJvdXNseVNldElubmVySFRNTD17e1xyXG5cdFx0XHRcdFx0X19odG1sOiBzcHJpbnRmKFxyXG5cdFx0XHRcdFx0XHRfXyhcIllvdSBjYW4gZmluZCB5b3VyIGxpY2Vuc2Uga2V5IGZyb20gJTEkcyB5b3VyIGFjY291bnQgJTIkcyBvbiBvdXIgd2Vic2l0ZS4gQW4gYWN0aXZlIGxpY2Vuc2UgaXMgcmVxdWlyZWQgdG8gdXNlIHRoZSB0aGVtZSBhbmQgcmVjZWl2ZSB1cGRhdGVzLiAlMyRzIElmIHRoZXJlIGlzIGFuIGVycm9yLCBwbGVhc2UgJTQkcyBjb250YWN0IG91ciBzdXBwb3J0ICU1JHMgLSAlNiRzIEhvdyB0byBhY3RpdmF0ZSB0aGUgdGhlbWUgbGljZW5zZS4gJTckc1wiLCBcImNvb2tlcnlcIiksXHJcblx0XHRcdFx0XHRcdGA8YSB0YXJnZXQ9XCJfYmxhbmtcIiBocmVmPSR7Y3dfZGFzaGJvYXJkLmFjY291bnR9PmAsXHJcblx0XHRcdFx0XHRcdCc8L2E+JyxcclxuXHRcdFx0XHRcdFx0Jzxici8+JyxcclxuXHRcdFx0XHRcdFx0YDxhIHRhcmdldD1cIl9ibGFua1wiIGhyZWY9JHtjd19kYXNoYm9hcmQuc3VwcG9ydH0+YCxcclxuXHRcdFx0XHRcdFx0JzwvYT4nLFxyXG5cdFx0XHRcdFx0XHQnPGEgdGFyZ2V0PVwiX2JsYW5rXCIgaHJlZj1cImh0dHBzOi8vYmxvc3NvbXRoZW1lcy5jb20vYWN0aXZlLXRoZW1lLWxpY2Vuc2UvP3V0bV9zb3VyY2U9Y29va2VyeSZ1dG1fbWVkaXVtPWRhc2hib2FyZCZ1dG1fY2FtcGFpZ249ZG9jc1wiPicsXHJcblx0XHRcdFx0XHRcdCc8L2E+J1xyXG5cdFx0XHRcdFx0KVxyXG5cdFx0XHRcdH19XHJcblx0XHRcdFx0XHRjbGFzc05hbWU9XCJkZXNjcmlwdGlvblwiXHJcblx0XHRcdFx0Lz5cclxuXHRcdFx0XHQ8ZGl2IGNsYXNzTmFtZT1cImxpY2Vuc2Uta2V5XCI+XHJcblx0XHRcdFx0XHQ8ZGl2IGNsYXNzTmFtZT1cImxpY2Vuc2Utc3RhdHVzXCI+XHJcblx0XHRcdFx0XHRcdHtpc0xvYWRpbmcgPyA8U3Bpbm5lciAvPiA6IChzYXZlZExpY2Vuc2UgJiYgPHAgZGFuZ2Vyb3VzbHlTZXRJbm5lckhUTUw9e3sgX19odG1sOiBzYXZlZExpY2Vuc2UgJiYgbGljZW5zZVN0YXR1cy5tZXNzYWdlIH19PjwvcD4gfHwgPHAgZGFuZ2Vyb3VzbHlTZXRJbm5lckhUTUw9e3tfX2h0bWw6bGljZW5zZVN0YXR1cy5tZXNzYWdlfX0+PC9wPil9XHJcblx0XHRcdFx0XHQ8L2Rpdj5cclxuXHRcdFx0XHRcdDxkaXYgY2xhc3NOYW1lPVwibGljZW5zZS1rZXktd3JhcHBlclwiPlxyXG5cdFx0XHRcdFx0XHQ8ZGl2IGNsYXNzTmFtZT1cInBhc3N3b3JkLXdyYXBwZXJcIj5cclxuXHRcdFx0XHRcdFx0XHQ8Zm9ybSBhY3Rpb249XCJnZXRcIiBhdXRvQ29tcGxldGU9XCJvZmZcIiBjbGFzc05hbWU9XCJsaWNmb3JtXCIgb25TdWJtaXQ9e2UgPT4gZS5wcmV2ZW50RGVmYXVsdCgpfT5cclxuXHRcdFx0XHRcdFx0XHRcdDxpbnB1dFxyXG5cdFx0XHRcdFx0XHRcdFx0XHRhdXRvQ29tcGxldGU9XCJmYWxzZVwiXHJcblx0XHRcdFx0XHRcdFx0XHRcdHJlcXVpcmVkXHJcblx0XHRcdFx0XHRcdFx0XHRcdGRpc2FibGVkPXtpc0FQSUpPQiB8fCBsaWNlbnNlU3RhdHVzLnN0YXR1cyA9PT0gXCJ2YWxpZFwifVxyXG5cdFx0XHRcdFx0XHRcdFx0XHR2YWx1ZT17bGljZW5zZUtleX1cclxuXHRcdFx0XHRcdFx0XHRcdFx0dHlwZT17c2hvd1Bhc3N3b3JkID8gXCJ0ZXh0XCIgOiBcInBhc3N3b3JkXCJ9XHJcblx0XHRcdFx0XHRcdFx0XHRcdG9uQ2hhbmdlPXsoZXZlbnQpID0+IHsgc2V0TGljZW5zZUtleShldmVudC50YXJnZXQudmFsdWUpOyB9fVxyXG5cdFx0XHRcdFx0XHRcdFx0XHRwbGFjZWhvbGRlcj17X18oXCJMaWNlbnNlIEtleVwiLCAnY29va2VyeScpfSAvPlxyXG5cdFx0XHRcdFx0XHRcdDwvZm9ybT5cclxuXHRcdFx0XHRcdFx0XHQ8YnV0dG9uIGNsYXNzTmFtZT0nc2hvdy1wYXNzd29yZCcgaHRtbEZvcj1cInBhc3N3b3JkXCIgZGlzYWJsZWQ9e2lzQVBJSk9CIHx8IGxpY2Vuc2VTdGF0dXMuc3RhdHVzID09PSBcInZhbGlkXCJ9IG9uQ2xpY2s9e2hhbmRsZVNob3dQYXNzd29yZH0+XHJcblx0XHRcdFx0XHRcdFx0XHQ8SWNvbiBpY29uPXtzaG93UGFzc3dvcmQgPyAnaGlkZVBhc3Nvd3JkJyA6ICdwcmV2aWV3J30gLz5cclxuXHRcdFx0XHRcdFx0XHQ8L2J1dHRvbj5cclxuXHRcdFx0XHRcdFx0PC9kaXY+XHJcblx0XHRcdFx0XHRcdDxkaXYgY2xhc3NOYW1lPVwiYnV0dG9uLXdyYXBwZXJcIj5cclxuXHRcdFx0XHRcdFx0XHQ8ZGl2IGNsYXNzTmFtZT1cImN3LWJ0bi13cmFwXCI+XHJcblx0XHRcdFx0XHRcdFx0XHR7XHJcblx0XHRcdFx0XHRcdFx0XHRcdHNhdmVkTGljZW5zZSAmJiBcInZhbGlkXCIgPT09IGxpY2Vuc2VTdGF0dXMuc3RhdHVzICYmXHJcblx0XHRcdFx0XHRcdFx0XHRcdDxidXR0b24gb25DbGljaz17ZGVBY3RpdmF0ZUxpY2Vuc2V9IHR5cGU9XCJzdWJtaXRcIiBzdHlsZT17eyBiYWNrZ3JvdW5kOiBcIiNEQzE0M0NcIiB9fSBkaXNhYmxlZD17aXNBUElKT0J9IGNsYXNzTmFtZT17YGFjdGJ0biBkZWFjdGl2YXRlICR7aXNBUElKT0IgJiYgYGN3LWJ0bi1sb2FkaW5nYH0gY3ctYnV0dG9uLWJ0biBwcmltYXJ5LWJ0bmB9PntfXyhcIkRlYWN0aXZhdGUgTGljZW5zZVwiLCBcImNvb2tlcnlcIil9PC9idXR0b24+XHJcblx0XHRcdFx0XHRcdFx0XHR9XHJcblx0XHRcdFx0XHRcdFx0XHR7XHJcblx0XHRcdFx0XHRcdFx0XHRcdFwidmFsaWRcIiAhPT0gbGljZW5zZVN0YXR1cy5zdGF0dXMgJiZcclxuXHRcdFx0XHRcdFx0XHRcdFx0PGJ1dHRvbiBkaXNhYmxlZD17IWxpY2Vuc2VLZXkgfHwgaXNBUElKT0J9IHR5cGU9XCJzdWJtaXRcIiBvbkNsaWNrPXthY3RpdmF0ZUxpY2Vuc2V9IGNsYXNzTmFtZT17YGFjdGJ0biAke2lzQVBJSk9CICYmIGBjdy1idG4tbG9hZGluZ2B9IGN3LWJ1dHRvbi1idG4gcHJpbWFyeS1idG5gfT57X18oXCJBY3RpdmF0ZSBMaWNlbnNlXCIsIFwiY29va2VyeVwiKX08L2J1dHRvbj59XHJcblx0XHRcdFx0XHRcdFx0XHR7aXNBUElKT0IgJiZcclxuXHRcdFx0XHRcdFx0XHRcdFx0PHN2ZyBzdHlsZT17eyBtYXJnaW5MZWZ0OiAnMTBweCcgfX0gY2xhc3NOYW1lPSdjdy1zdmcnIHdpZHRoPVwiMTVcIiBoZWlnaHQ9XCIxNVwiIHZpZXdCb3g9XCIwIDAgMTAwIDEwMFwiPlxyXG5cdFx0XHRcdFx0XHRcdFx0XHRcdDxnIHRyYW5zZm9ybT1cInRyYW5zbGF0ZSg1MCw1MClcIj5cclxuXHRcdFx0XHRcdFx0XHRcdFx0XHRcdDxnIHRyYW5zZm9ybT1cInNjYWxlKDEpXCI+XHJcblx0XHRcdFx0XHRcdFx0XHRcdFx0XHRcdDxjaXJjbGUgY3g9XCIwXCIgY3k9XCIwXCIgcj1cIjUwXCIgZmlsbD1cIiM2ODdjOTNcIiAvPlxyXG5cdFx0XHRcdFx0XHRcdFx0XHRcdFx0XHQ8Y2lyY2xlXHJcblx0XHRcdFx0XHRcdFx0XHRcdFx0XHRcdFx0Y3g9XCIwXCJcclxuXHRcdFx0XHRcdFx0XHRcdFx0XHRcdFx0XHRjeT1cIi0yNlwiXHJcblx0XHRcdFx0XHRcdFx0XHRcdFx0XHRcdFx0cj1cIjEyXCJcclxuXHRcdFx0XHRcdFx0XHRcdFx0XHRcdFx0XHRmaWxsPVwiI2ZmZmZmZlwiXHJcblx0XHRcdFx0XHRcdFx0XHRcdFx0XHRcdFx0dHJhbnNmb3JtPVwicm90YXRlKDE2MS42MzQpXCI+XHJcblx0XHRcdFx0XHRcdFx0XHRcdFx0XHRcdFx0PGFuaW1hdGVUcmFuc2Zvcm1cclxuXHRcdFx0XHRcdFx0XHRcdFx0XHRcdFx0XHRcdGF0dHJpYnV0ZU5hbWU9XCJ0cmFuc2Zvcm1cIlxyXG5cdFx0XHRcdFx0XHRcdFx0XHRcdFx0XHRcdFx0dHlwZT1cInJvdGF0ZVwiXHJcblx0XHRcdFx0XHRcdFx0XHRcdFx0XHRcdFx0XHRjYWxjTW9kZT1cImxpbmVhclwiXHJcblx0XHRcdFx0XHRcdFx0XHRcdFx0XHRcdFx0XHR2YWx1ZXM9XCIwIDAgMDszNjAgMCAwXCJcclxuXHRcdFx0XHRcdFx0XHRcdFx0XHRcdFx0XHRcdGtleVRpbWVzPVwiMDsxXCJcclxuXHRcdFx0XHRcdFx0XHRcdFx0XHRcdFx0XHRcdGR1cj1cIjFzXCJcclxuXHRcdFx0XHRcdFx0XHRcdFx0XHRcdFx0XHRcdGJlZ2luPVwiMHNcIlxyXG5cdFx0XHRcdFx0XHRcdFx0XHRcdFx0XHRcdFx0cmVwZWF0Q291bnQ9XCJpbmRlZmluaXRlXCJcclxuXHRcdFx0XHRcdFx0XHRcdFx0XHRcdFx0XHQvPlxyXG5cdFx0XHRcdFx0XHRcdFx0XHRcdFx0XHQ8L2NpcmNsZT5cclxuXHRcdFx0XHRcdFx0XHRcdFx0XHRcdDwvZz5cclxuXHRcdFx0XHRcdFx0XHRcdFx0XHQ8L2c+XHJcblx0XHRcdFx0XHRcdFx0XHRcdDwvc3ZnPlxyXG5cdFx0XHRcdFx0XHRcdFx0fVxyXG5cdFx0XHRcdFx0XHRcdDwvZGl2PlxyXG5cdFx0XHRcdFx0XHRcdHsoXCJ2YWxpZFwiICE9PSBsaWNlbnNlU3RhdHVzLnN0YXR1cyAmJiBzYXZlZExpY2Vuc2UpICYmXHJcblx0XHRcdFx0XHRcdFx0XHQ8ZGl2IGNsYXNzTmFtZT1cInJlc2V0LWxpY2Vuc2VcIj5cclxuXHRcdFx0XHRcdFx0XHRcdFx0PGEgaHJlZj1cIiNcIiBvbkNsaWNrPXtoYW5kbGVSZXNldExpY2Vuc2V9ID57X18oJ1Jlc2V0IExpY2Vuc2UnLCAnY29va2VyeScpfTwvYT5cclxuXHRcdFx0XHRcdFx0XHRcdDwvZGl2PlxyXG5cdFx0XHRcdFx0XHRcdH1cclxuXHRcdFx0XHRcdFx0PC9kaXY+XHJcblx0XHRcdFx0XHQ8L2Rpdj5cclxuXHRcdFx0XHQ8L2Rpdj5cclxuXHRcdFx0PC9kaXY+XHJcblx0XHQ8Lz5cclxuXHQpXHJcbn1cclxuXHJcbmV4cG9ydCBkZWZhdWx0IExpY2Vuc2U7IiwiaW1wb3J0IHsgIFNFTywgcGx1Z2lucywgR0RQUiwgc3VwcG9ydCwgdGhlbWVJbnN0YWxsIH0gZnJvbSBcIi4uLy4uL2NvbXBvbmVudHMvaW1hZ2VzXCI7XHJcblxyXG5pbXBvcnQgeyBfXyB9IGZyb20gXCJAd29yZHByZXNzL2kxOG5cIlxyXG5pbXBvcnQgeyBDYXJkLCBPZmZlciB9IGZyb20gXCIuLi8uLi9jb21wb25lbnRzXCI7XHJcblxyXG5jb25zdCBPZmZlcnMgPSAoKSA9PiB7XHJcblxyXG4gICAgY29uc3QgY2FyZExpc3RzID0gW1xyXG4gICAgICAgIHtcclxuICAgICAgICAgICAgaW1hZ2V1cmw6IHRoZW1lSW5zdGFsbCxcclxuICAgICAgICAgICAgaGVhZGluZzogX18oJ1RoZW1lIEluc3RhbGxhdGlvbiBhbmQgU2V0dXAnLCAnY29va2VyeScpLFxyXG4gICAgICAgICAgICBoZWFkaW5nVXJsOiBjd19kYXNoYm9hcmQudGhlbWVfaW5zdGFsbCxcclxuICAgICAgICAgICAgcGFyYTogX18oJ1dpdGggdGhpcyBzZXJ2aWNlLCBvdXIgZXhwZXJ0IHRlYW0gd2lsbCBpbnN0YWxsIHRoZSB0aGVtZSBvbiB5b3VyIFdvcmRQcmVzcyB3ZWJzaXRlIGFuZCBtYWtlIGl0IGxvb2sgbGlrZSB0aGUgZGVtby4nLCAnY29va2VyeScpLFxyXG4gICAgICAgICAgICBidXR0b25UZXh0OiBfXygnVmlldyBEZXRhaWxzJywgJ2Nvb2tlcnknKSxcclxuICAgICAgICAgICAgYnV0dG9uVXJsOiBjd19kYXNoYm9hcmQudGhlbWVfaW5zdGFsbFxyXG4gICAgICAgIH0sXHJcbiAgICAgICAge1xyXG4gICAgICAgICAgICBpbWFnZXVybDogR0RQUixcclxuICAgICAgICAgICAgaGVhZGluZzogX18oJ0dEUFIgQ29tcGxpYW5jZScsICdjb29rZXJ5JyksXHJcbiAgICAgICAgICAgIGhlYWRpbmdVcmw6IGN3X2Rhc2hib2FyZC5nZHByX3NldHVwLFxyXG4gICAgICAgICAgICBwYXJhOiBfXygnVGhpcyBzZXJ2aWNlIGhlbHBzIHlvdSBpbnRlZ3JhdGUgYWxsIG9mIHRoZSByZXF1aXJlZCBmZWF0dXJlcyB0byBwcm90ZWN0IHlvdXIgdmlzaXRvcnPigJkgZGF0YSwgbWFraW5nIHlvdXIgd2Vic2l0ZSBjb21wbGlhbnQgd2l0aCB0aGUgbmV3IEdEUFIgY29tcGxpYW5jZS4nLCAnY29va2VyeScpLFxyXG4gICAgICAgICAgICBidXR0b25UZXh0OiBfXygnVmlldyBEZXRhaWxzJywgJ2Nvb2tlcnknKSxcclxuICAgICAgICAgICAgYnV0dG9uVXJsOiBjd19kYXNoYm9hcmQuZ2Rwcl9zZXR1cFxyXG4gICAgICAgIH0sXHJcbiAgICAgICAge1xyXG4gICAgICAgICAgICBpbWFnZXVybDogU0VPLFxyXG4gICAgICAgICAgICBoZWFkaW5nOiBfXygnTXVzdCBoYXZlIFNFTyBTZXR1cCcsICdjb29rZXJ5JyksXHJcbiAgICAgICAgICAgIGhlYWRpbmdVcmw6IGN3X2Rhc2hib2FyZC5zZW9fc2V0dXAsXHJcbiAgICAgICAgICAgIHBhcmE6IF9fKCdUaGlzIE11c3QtSGF2ZSBTRU8gU2V0dXAgc2VydmljZSB3aWxsIGhlbHAgdG8gb3B0aW1pc2UgeW91ciB3ZWJzaXRlLCBpbmNyZWFzZSBzZWFyY2ggdmlzaWJpbGl0eSBhbmQgZ2l2ZSB5b3UgaW5zaWdodHMgaW50byBob3cgeW91ciBzaXRlIGlzIHBlcmZvcm1pbmcuJywgJ2Nvb2tlcnknKSxcclxuICAgICAgICAgICAgYnV0dG9uVGV4dDogX18oJ1ZpZXcgRGV0YWlscycsICdjb29rZXJ5JyksXHJcbiAgICAgICAgICAgIGJ1dHRvblVybDogY3dfZGFzaGJvYXJkLnNlb19zZXR1cFxyXG4gICAgICAgIH0sXHJcbiAgICAgICAge1xyXG4gICAgICAgICAgICBpbWFnZXVybDogcGx1Z2lucyxcclxuICAgICAgICAgICAgaGVhZGluZzogX18oJ011c3QgSGF2ZSBQbHVnaW5zIFNldHVwJywgJ2Nvb2tlcnknKSxcclxuICAgICAgICAgICAgaGVhZGluZ1VybDogY3dfZGFzaGJvYXJkLnBsdWdpbl9zZXR1cCxcclxuICAgICAgICAgICAgcGFyYTogX18oJ1dpdGggdGhpcyBzZXJ2aWNlLCB3ZSB3aWxsIGluc3RhbGwgYW5kIGNvbmZpZ3VyZSB0aGUgZXNzZW50aWFsIHBsdWdpbnMgdG8gdHVybiB5b3VyIHNpdGUgaW50byBhIHBvd2VyZnVsIGVuZ2luZSBhbmQga2VlcCBpdCBzYWZlIGZyb20gaGFja2Vycy4nLCAnY29va2VyeScpLFxyXG4gICAgICAgICAgICBidXR0b25UZXh0OiBfXygnVmlldyBEZXRhaWxzJywgJ2Nvb2tlcnknKSxcclxuICAgICAgICAgICAgYnV0dG9uVXJsOiBjd19kYXNoYm9hcmQucGx1Z2luX3NldHVwXHJcbiAgICAgICAgfSxcclxuICAgICAgICB7XHJcbiAgICAgICAgICAgIGltYWdldXJsOiBzdXBwb3J0LFxyXG4gICAgICAgICAgICBoZWFkaW5nOiBfXygnVklQIFN1cHBvcnQnLCAnY29va2VyeScpLFxyXG4gICAgICAgICAgICBoZWFkaW5nVXJsOiBjd19kYXNoYm9hcmQudmlwX3N1cHBvcnQsXHJcbiAgICAgICAgICAgIHBhcmE6IF9fKCdBZGQgMTIgbW9udGhzIG9mIFZJUCBzdXBwb3J0IHRvIHlvdXIgcHVyY2hhc2UuIFdpdGggVklQIFN1cHBvcnQsIHlvdSBnZXQgdGhlIGhpZ2hlc3QgcHJpb3JpdHkgYW5kIGZhc3RlciByZXNvbHV0aW9ucyB0byB5b3VyIHN1cHBvcnQgdGlja2V0IScsICdjb29rZXJ5JyksXHJcbiAgICAgICAgICAgIGJ1dHRvblRleHQ6IF9fKCdWaWV3IERldGFpbHMnLCAnY29va2VyeScpLFxyXG4gICAgICAgICAgICBidXR0b25Vcmw6IGN3X2Rhc2hib2FyZC52aXBfc3VwcG9ydFxyXG4gICAgICAgIH0sXHJcbiAgICBdO1xyXG5cclxuICAgIHJldHVybiAoXHJcbiAgICAgICAgPD5cclxuICAgICAgICAgICAgPE9mZmVyIC8+XHJcbiAgICAgICAgICAgIDxDYXJkXHJcbiAgICAgICAgICAgICAgICBjYXJkTGlzdD17Y2FyZExpc3RzfVxyXG4gICAgICAgICAgICAgICAgY2FyZFBsYWNlPSdjdy1vZmZlci1jYXJkJ1xyXG4gICAgICAgICAgICAgICAgY2FyZENvbD0ndGhyZWUtY29sJ1xyXG4gICAgICAgICAgICAvPlxyXG4gICAgICAgIDwvPlxyXG4gICAgKVxyXG59XHJcblxyXG5leHBvcnQgZGVmYXVsdCBPZmZlcnM7IiwiaW1wb3J0IHsgSWNvbiB9IGZyb20gXCIuLi8uLi9jb21wb25lbnRzXCI7XHJcbmltcG9ydCB7IG1haW5EZW1vLCBkZW1vMiwgZGVtbzMgfSBmcm9tIFwiLi4vLi4vY29tcG9uZW50cy9pbWFnZXNcIjtcclxuaW1wb3J0IHsgX18sIHNwcmludGYgfSBmcm9tIFwiQHdvcmRwcmVzcy9pMThuXCI7XHJcbmltcG9ydCB7IHVzZVN0YXRlLCB1c2VFZmZlY3QgfSBmcm9tICdAd29yZHByZXNzL2VsZW1lbnQnO1xyXG5pbXBvcnQgeyBTcGlubmVyIH0gZnJvbSAnQHdvcmRwcmVzcy9jb21wb25lbnRzJztcclxuXHJcbmNvbnN0IFN0YXJ0ZXJTaXRlcyA9ICgpID0+IHtcclxuICAgIGNvbnN0IFtidXR0b25TdGF0ZSwgc2V0QnV0dG9uU3RhdGVdID0gdXNlU3RhdGUoJ2luc3RhbGwnKTtcclxuICAgIGNvbnN0IFthY3RpdmF0ZVVybCwgc2V0QWN0aXZhdGVVcmxdID0gdXNlU3RhdGUoW10pO1xyXG5cclxuICAgIGNvbnN0IGRlbW9VcmwgPSBgJHtjd19kYXNoYm9hcmQuYWRtaW5fdXJsfXRoZW1lcy5waHA/cGFnZT1kZW1vLWltcG9ydGVyLXBsdXNgO1xyXG5cclxuICAgIHVzZUVmZmVjdCgoKSA9PiB7XHJcbiAgICAgICAgY29uc3QgaW5hY3RpdmVQbHVnaW5zID0gY3dfZGFzaGJvYXJkLmluYWN0aXZlUGx1Z2lucztcclxuICAgICAgICBjb25zdCBhY3RpdmVQbHVnaW5zID0gY3dfZGFzaGJvYXJkLmFjdGl2ZVBsdWdpbnNcclxuXHJcbiAgICAgICAgY29uc3QgZGVtb0ltcG9ydGVyUGx1cyA9IGluYWN0aXZlUGx1Z2lucy5maW5kKHBsdWdpbiA9PiBwbHVnaW4uc2x1ZyA9PT0gXCJkZW1vLWltcG9ydGVyLXBsdXNcIik7XHJcblxyXG4gICAgICAgIGlmIChkZW1vSW1wb3J0ZXJQbHVzKSB7XHJcbiAgICAgICAgICAgIHNldEJ1dHRvblN0YXRlKCdpbmFjdGl2ZScpO1xyXG4gICAgICAgICAgICBjb25zdCB1cmwgPSBkZW1vSW1wb3J0ZXJQbHVzLnVybC5yZXBsYWNlKC8mYW1wOy9nLCAnJicpO1xyXG4gICAgICAgICAgICBzZXRBY3RpdmF0ZVVybChbdXJsXSk7XHJcbiAgICAgICAgfVxyXG4gICAgICAgIGVsc2Uge1xyXG4gICAgICAgICAgICBjb25zdCBkZW1vSW1wb3J0ZXJQbHVzQWN0aXZlID0gYWN0aXZlUGx1Z2lucy5maW5kKHBsdWdpbiA9PiBwbHVnaW4uc2x1ZyA9PT0gXCJkZW1vLWltcG9ydGVyLXBsdXNcIik7XHJcbiAgICAgICAgICAgIGlmIChkZW1vSW1wb3J0ZXJQbHVzQWN0aXZlKSB7XHJcbiAgICAgICAgICAgICAgICBzZXRCdXR0b25TdGF0ZSgnYWN0aXZlJyk7XHJcbiAgICAgICAgICAgIH1cclxuICAgICAgICB9XHJcbiAgICB9LCBbXSk7XHJcblxyXG4gICAgY29uc3QgaGFuZGxlRGVtb0ltcG9ydGVyID0gKCkgPT4ge1xyXG4gICAgICAgIHNldEJ1dHRvblN0YXRlKFwiaW5zdGFsbGluZ1wiKTtcclxuXHJcbiAgICAgICAgd3AudXBkYXRlcy5pbnN0YWxsUGx1Z2luKHtcclxuICAgICAgICAgICAgc2x1ZzogXCJkZW1vLWltcG9ydGVyLXBsdXNcIixcclxuICAgICAgICAgICAgc3VjY2VzczogKHJlc3BvbnNlKSA9PiB7XHJcbiAgICAgICAgICAgICAgICBzZXRBY3RpdmF0ZVVybChbcmVzcG9uc2UuYWN0aXZhdGVVcmxdKTtcclxuICAgICAgICAgICAgICAgIHNldEJ1dHRvblN0YXRlKFwiaW5hY3RpdmVcIik7XHJcbiAgICAgICAgICAgIH0sXHJcbiAgICAgICAgICAgIGVycm9yOiAoZXJyb3IpID0+IHtcclxuICAgICAgICAgICAgICAgIGNvbnNvbGUuZXJyb3IoZXJyb3IpO1xyXG4gICAgICAgICAgICAgICAgc2V0QnV0dG9uU3RhdGUoXCJpbnN0YWxsXCIpO1xyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgfSk7XHJcbiAgICB9XHJcblxyXG4gICAgYXN5bmMgZnVuY3Rpb24gYWN0aXZhdGVQbHVnaW5zKCkge1xyXG4gICAgICAgIHNldEJ1dHRvblN0YXRlKCdhY3RpdmF0aW5nJyk7XHJcbiAgICAgICAgZm9yIChjb25zdCB1cmwgb2YgYWN0aXZhdGVVcmwpIHtcclxuICAgICAgICAgICAgdHJ5IHtcclxuICAgICAgICAgICAgICAgIGNvbnN0IHVybE9iaiA9IG5ldyBVUkwodXJsKTtcclxuICAgICAgICAgICAgICAgIGNvbnN0IHJlc3BvbnNlID0gYXdhaXQgZmV0Y2godXJsLCB7XHJcbiAgICAgICAgICAgICAgICAgICAgbWV0aG9kOiAnUE9TVCcsXHJcbiAgICAgICAgICAgICAgICAgICAgaGVhZGVyczoge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAnQ29udGVudC1UeXBlJzogJ2FwcGxpY2F0aW9uL3gtd3d3LWZvcm0tdXJsZW5jb2RlZCcsXHJcbiAgICAgICAgICAgICAgICAgICAgfSxcclxuICAgICAgICAgICAgICAgICAgICBib2R5OiBuZXcgVVJMU2VhcmNoUGFyYW1zKHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgX3dwbm9uY2U6IHVybE9iai5zZWFyY2hQYXJhbXMuZ2V0KCdfd3Bub25jZScpLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICBhY3Rpb246ICdhY3RpdmF0ZScsXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIHBsdWdpbjogdXJsT2JqLnNlYXJjaFBhcmFtcy5nZXQoJ3BsdWdpbicpLFxyXG4gICAgICAgICAgICAgICAgICAgIH0pLnRvU3RyaW5nKCksXHJcbiAgICAgICAgICAgICAgICB9KTtcclxuXHJcbiAgICAgICAgICAgICAgICBpZiAoIXJlc3BvbnNlLm9rKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgdGhyb3cgbmV3IEVycm9yKGBIVFRQIGVycm9yISBzdGF0dXM6ICR7cmVzcG9uc2Uuc3RhdHVzfWApO1xyXG4gICAgICAgICAgICAgICAgfVxyXG5cclxuICAgICAgICAgICAgfSBjYXRjaCAoZXJyb3IpIHtcclxuICAgICAgICAgICAgICAgIGNvbnNvbGUuZXJyb3IoYEVycm9yIGFjdGl2YXRpbmcgcGx1Z2luOiAke3VybH1gLCBlcnJvcik7XHJcbiAgICAgICAgICAgIH1cclxuICAgICAgICB9XHJcbiAgICAgICAgc2V0QnV0dG9uU3RhdGUoJ2FjdGl2ZScpO1xyXG4gICAgfVxyXG5cclxuXHJcbiAgICByZXR1cm4gKFxyXG4gICAgICAgIDw+XHJcbiAgICAgICAgICAgIDxkaXYgY2xhc3NOYW1lPVwic3RhcnRlci1zaXRlc1wiPlxyXG4gICAgICAgICAgICAgICAgPGRpdiBjbGFzc05hbWU9XCJpbWFnZS13cmFwcGVyXCI+XHJcbiAgICAgICAgICAgICAgICAgICAgPGRpdiBjbGFzc05hbWU9XCJpbWFnZVwiPlxyXG4gICAgICAgICAgICAgICAgICAgICAgICA8aW1nIHNyYz17ZGVtbzJ9IGFsdD1cIlwiIC8+XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIDxkaXYgY2xhc3NOYW1lPVwicmV2ZXJzZS1pbWFnZVwiPlxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgPGltZyBzcmM9e2RlbW8yfSBhbHQ9XCJcIiAvPlxyXG4gICAgICAgICAgICAgICAgICAgICAgICA8L2Rpdj5cclxuICAgICAgICAgICAgICAgICAgICA8L2Rpdj5cclxuICAgICAgICAgICAgICAgICAgICA8ZGl2IGNsYXNzTmFtZT1cImltYWdlXCI+XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIDxpbWcgc3JjPXttYWluRGVtb30gYWx0PVwiXCIgLz5cclxuICAgICAgICAgICAgICAgICAgICAgICAgPGRpdiBjbGFzc05hbWU9XCJyZXZlcnNlLWltYWdlXCI+XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICA8aW1nIHNyYz17bWFpbkRlbW99IGFsdD1cIlwiIC8+XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIDwvZGl2PlxyXG4gICAgICAgICAgICAgICAgICAgIDwvZGl2PlxyXG4gICAgICAgICAgICAgICAgICAgIDxkaXYgY2xhc3NOYW1lPVwiaW1hZ2VcIj5cclxuICAgICAgICAgICAgICAgICAgICAgICAgPGltZyBzcmM9e2RlbW8zfSBhbHQ9XCJcIiAvPlxyXG4gICAgICAgICAgICAgICAgICAgICAgICA8ZGl2IGNsYXNzTmFtZT1cInJldmVyc2UtaW1hZ2VcIj5cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIDxpbWcgc3JjPXtkZW1vM30gYWx0PVwiXCIgLz5cclxuICAgICAgICAgICAgICAgICAgICAgICAgPC9kaXY+XHJcbiAgICAgICAgICAgICAgICAgICAgPC9kaXY+XHJcbiAgICAgICAgICAgICAgICA8L2Rpdj5cclxuICAgICAgICAgICAgICAgIDxkaXYgY2xhc3NOYW1lPVwidGV4dC13cmFwcGVyXCI+XHJcbiAgICAgICAgICAgICAgICAgICAgPGgyPntfXygnT25lIENsaWNrIERlbW8gSW1wb3J0JywgJ2Jsb3Nzb20tcGluLXBybycpfTwvaDI+XHJcbiAgICAgICAgICAgICAgICAgICAgPHAgZGFuZ2Vyb3VzbHlTZXRJbm5lckhUTUw9e3sgX19odG1sOiBzcHJpbnRmKF9fKCdHZXQgc3RhcnRlZCBlZmZvcnRsZXNzbHkhIFVzZSBvdXIgb25lLWNsaWNrIGRlbW8gaW1wb3J0IGZlYXR1cmUgdG8gc2V0IHVwIHlvdXIgc2l0ZSBpbnN0YW50bHkgd2l0aCBhbGwgdGhlIHNhbXBsZSBkYXRhIGFuZCBzZXR0aW5ncy4gUGxlYXNlIG5vdGUgdGhhdCBpbXBvcnRpbmcgZGVtbyBjb250ZW50IHdpbGwgb3ZlcndyaXRlIHlvdXIgZXhpc3Rpbmcgc2l0ZSBjb250ZW50IGFuZCBzZXR0aW5ncy4gJXMgTm90IHJlY29tbWVuZGVkIGlmIHlvdSBoYXZlIGV4aXN0aW5nIGNvbnRlbnQuICVzJywgJ2Jsb3Nzb20tcGluLXBybycpLCAnPGI+JywgJzwvYj4nKSB9fSAvPlxyXG4gICAgICAgICAgICAgICAgICAgIDxkaXYgY2xhc3NOYW1lPVwiY3ctYnV0dG9uXCI+XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIHsoYnV0dG9uU3RhdGUgPT0gXCJpbnN0YWxsXCIgfHwgYnV0dG9uU3RhdGUgPT0gXCJpbnN0YWxsaW5nXCIpICYmXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICA8YnV0dG9uIGNsYXNzTmFtZT1cImN3LWJ1dHRvbi1idG4gcHJpbWFyeS1idG5cIiBvbkNsaWNrPXtoYW5kbGVEZW1vSW1wb3J0ZXJ9ID5cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICB7X18oJ0luc3RhbGwgU3RhcnRlciBTaXRlcycsICdibG9zc29tLXBpbi1wcm8nKX0gPEljb24gaWNvbj1cImFycm93XCIgLz5cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICB7YnV0dG9uU3RhdGUgPT0gXCJpbnN0YWxsaW5nXCIgJiYgPFNwaW5uZXIgLz59XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICA8L2J1dHRvbj5cclxuICAgICAgICAgICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgICAgICAgICB7KGJ1dHRvblN0YXRlID09IFwiaW5hY3RpdmVcIiB8fCBidXR0b25TdGF0ZSA9PSBcImFjdGl2YXRpbmdcIikgJiZcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIDxidXR0b24gY2xhc3NOYW1lPVwiY3ctYnV0dG9uLWJ0biBwcmltYXJ5LWJ0blwiIG9uQ2xpY2s9e2FjdGl2YXRlUGx1Z2luc30+XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAge19fKCdBY3RpdmF0ZSBTdGFydGVyIFNpdGVzJywgJ2Jsb3Nzb20tcGluLXBybycpfSA8SWNvbiBpY29uPVwiYXJyb3dcIiAvPlxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIHtidXR0b25TdGF0ZSA9PSBcImFjdGl2YXRpbmdcIiAmJiA8U3Bpbm5lciAvPn1cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIDwvYnV0dG9uPlxyXG4gICAgICAgICAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIHtidXR0b25TdGF0ZSA9PSBcImFjdGl2ZVwiICYmXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICA8YSBocmVmPXtkZW1vVXJsfSBjbGFzc05hbWU9XCJjdy1idXR0b24tYnRuIHByaW1hcnktYnRuXCI+XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAge19fKCdJbXBvcnQgU3RhcnRlciBTaXRlcycsICdibG9zc29tLXBpbi1wcm8nKX0gPEljb24gaWNvbj1cImFycm93XCIgLz5cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIDwvYT5cclxuICAgICAgICAgICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgICAgIDwvZGl2PlxyXG4gICAgICAgICAgICAgICAgPC9kaXY+XHJcbiAgICAgICAgICAgIDwvZGl2PlxyXG4gICAgICAgIDwvPlxyXG4gICAgKTtcclxufVxyXG5cclxuZXhwb3J0IGRlZmF1bHQgU3RhcnRlclNpdGVzOyIsImltcG9ydCB7IEljb24gfSBmcm9tIFwiLi4vLi4vY29tcG9uZW50c1wiO1xyXG5pbXBvcnQgeyB1c2VTdGF0ZSwgdXNlRWZmZWN0IH0gZnJvbSAnQHdvcmRwcmVzcy9lbGVtZW50JztcclxuaW1wb3J0IHsgX18gfSBmcm9tICdAd29yZHByZXNzL2kxOG4nO1xyXG5cclxuY29uc3QgcGx1Z2luTGlzdCA9IFtcclxuICAgIHtcclxuICAgICAgICBwbHVnaW5OYW1lOiBfXyggJ1dQIERlbGljaW91cyDigJMgQmVzdCBXb3JkUHJlc3MgUmVjaXBlIFBsdWdpbicsICdjb29rZXJ5JyApLFxyXG4gICAgICAgIGRlc2NyaXB0aW9uOiBfXyhcIkEgcG93ZXJmdWwgcmVjaXBlIHBsdWdpbiB0byBjcmVhdGUgYW5kIGRpc3BsYXkgcmVjaXBlcyBmb3IgYmxvZ2dlcnMuIFNFTyBvcHRpbWl6ZWQgYW5kIFNjaGVtYS1mcmllbmRseSB0byByYW5rIHJlY2lwZXMgaGlnaGVyIG9uIHNlYXJjaCBlbmdpbmVzLlwiLCBcImNvb2tlcnlcIiksXHJcbiAgICAgICAgc2x1ZzogXCJkZWxpY2lvdXMtcmVjaXBlc1wiXHJcbiAgICB9LFxyXG4gICAge1xyXG4gICAgICAgIHBsdWdpbk5hbWU6IF9fKCAnQmxvc3NvbVRoZW1lcyBUb29sa2l0JywgJ2Nvb2tlcnknICksXHJcbiAgICAgICAgZGVzY3JpcHRpb246IF9fKFwiQmxvc3NvbVRoZW1lcyBUb29sa2l0IHByb3ZpZGVzIHlvdSBuZWNlc3Nhcnkgd2lkZ2V0cyBmb3IgYmV0dGVyIGFuZCBlZmZlY3RpdmUgYmxvZ2dpbmcuXCIsIFwiY29va2VyeVwiKSxcclxuICAgICAgICBzbHVnOiBcImJsb3Nzb210aGVtZXMtdG9vbGtpdFwiXHJcbiAgICB9LFxyXG4gICAge1xyXG4gICAgICAgIHBsdWdpbk5hbWU6IF9fKCAnRGVtbyBJbXBvcnRlciBQbHVzJywgJ2Nvb2tlcnknICksXHJcbiAgICAgICAgZGVzY3JpcHRpb246IF9fKFwiRGVtbyBJbXBvcnRlciBQbHVzIGFsbG93cyB5b3UgdG8gSW1wb3J0IHRoZSBkZW1vIGNvbnRlbnQsIHdpZGdldHMsIGN1c3RvbWl6ZXIgc2V0dGluZ3MgYW5kIHRoZW1lIHNldHRpbmdzIHdpdGggYSBzaW5nbGUgY2xpY2sgd2l0aG91dCBhbnkgaGFzc2xlLlwiLCBcImNvb2tlcnlcIiksXHJcbiAgICAgICAgc2x1ZzogXCJkZW1vLWltcG9ydGVyLXBsdXNcIlxyXG4gICAgfSxcclxuICAgIHtcclxuICAgICAgICBwbHVnaW5OYW1lOiBfXyggJ0Jsb3Nzb21UaGVtZXMgRW1haWwgTmV3c2xldHRlcicsICdjb29rZXJ5JyApLFxyXG4gICAgICAgIGRlc2NyaXB0aW9uOiBfXyhcIkVhc2lseSBhZGQgZW1haWwgc3Vic2NyaXB0aW9uIGZvcm0gdG8geW91ciB3ZWJzaXRlIHVzaW5nIHNob3J0Y29kZSBhbmQgd2lkZ2V0LlwiLCBcImNvb2tlcnlcIiksXHJcbiAgICAgICAgc2x1ZzogXCJibG9zc29tdGhlbWVzLWVtYWlsLW5ld3NsZXR0ZXJcIlxyXG4gICAgfSxcclxuICAgIHtcclxuICAgICAgICBwbHVnaW5OYW1lOiBfXyggJ0NvbnRhY3QgRm9ybSA3JywgJ2Nvb2tlcnknICksXHJcbiAgICAgICAgZGVzY3JpcHRpb246IF9fKFwiSnVzdCBhbm90aGVyIGNvbnRhY3QgZm9ybSBwbHVnaW4uIFNpbXBsZSBidXQgZmxleGlibGUuXCIsIFwiY29va2VyeVwiKSxcclxuICAgICAgICBzbHVnOiBcImNvbnRhY3QtZm9ybS03XCJcclxuICAgIH0sXHJcbiAgICB7XHJcbiAgICAgICAgcGx1Z2luTmFtZTogX18oICdDdXN0b21pemVyIFNlYXJjaCcsICdjb29rZXJ5JyApLFxyXG4gICAgICAgIGRlc2NyaXB0aW9uOiBfXyhcIlNlYXJjaCBmb3Igc2V0dGluZ3MgaW4gY3VzdG9taXplci5cIiwgXCJjb29rZXJ5XCIpLFxyXG4gICAgICAgIHNsdWc6IFwiY3VzdG9taXplci1zZWFyY2hcIlxyXG4gICAgfSxcclxuICAgIHtcclxuICAgICAgICBwbHVnaW5OYW1lOiBfXyggJ1JlZ2VuZXJhdGUgVGh1bWJuYWlscycsICdjb29rZXJ5JyApLFxyXG4gICAgICAgIGRlc2NyaXB0aW9uOiBfXyhcIlJlZ2VuZXJhdGUgdGhlIHRodW1ibmFpbHMgZm9yIG9uZSBvciBtb3JlIG9mIHlvdXIgaW1hZ2UgdXBsb2Fkcy4gVXNlZnVsIHdoZW4gY2hhbmdpbmcgdGhlaXIgc2l6ZXMgb3IgeW91ciB0aGVtZS5cIiwgXCJjb29rZXJ5XCIpLFxyXG4gICAgICAgIHNsdWc6IFwicmVnZW5lcmF0ZS10aHVtYm5haWxzXCJcclxuICAgIH0sXHJcbiAgICB7XHJcbiAgICAgICAgcGx1Z2luTmFtZTogX18oICdFbGVtZW50b3IgV2Vic2l0ZSBCdWlsZGVyJywgJ2Nvb2tlcnknICksXHJcbiAgICAgICAgZGVzY3JpcHRpb246IF9fKFwiRWxlbWVudG9yLCB0aGUgbGVhZGluZyBXb3JkUHJlc3Mgd2Vic2l0ZSBidWlsZGVyLGVtcG93ZXJzIHlvdSB0byBidWlsZCBwcm9mZXNzaW9uYWwsIHBpeGVsLXBlcmZlY3Qgd2Vic2l0ZXNcIiwgXCJjb29rZXJ5XCIpLFxyXG4gICAgICAgIHNsdWc6IFwiZWxlbWVudG9yXCJcclxuICAgIH0sXHJcbiAgICB7XHJcbiAgICAgICAgcGx1Z2luTmFtZTogX18oICdBZmZpbGlhdGVYIOKAkyBCZXN0IEFtYXpvbiBBZmZpbGlhdGUgV29yZFByZXNzIFBsdWdpbicsICdjb29rZXJ5JyApLFxyXG4gICAgICAgIGRlc2NyaXB0aW9uOiBfXyhcIkNyZWF0ZSBhIHByb2Zlc3Npb25hbC1sb29raW5nIGFmZmlsaWF0ZSB3ZWJzaXRlcyB3aXRoIGhpZ2hseSBjdXN0b21pemFibGUgYmxvY2tzIHRoYXQgaGVscCBpbiBpbmNyZWFzaW5nIHRoZSBjb252ZXJzaW9uIHJhdGUgYW5kIGJvb3N0IHlvdXIgYWZmaWxpYXRlIGluY29tZS5cIiwgXCJjb29rZXJ5XCIpLFxyXG4gICAgICAgIHNsdWc6IFwiYWZmaWxpYXRleFwiXHJcbiAgICB9LFxyXG4gICAge1xyXG4gICAgICAgIHBsdWdpbk5hbWU6IF9fKCAnU21hc2ggQmFsbG9vbiBTb2NpYWwgUGhvdG8gRmVlZCcsICdjb29rZXJ5JyApLFxyXG4gICAgICAgIGRlc2NyaXB0aW9uOiBfXyhcIkZvcm1lcmx5ICdJbnN0YWdyYW0gRmVlZCcuIERpc3BsYXkgY2xlYW4sIGN1c3RvbWl6YWJsZSwgYW5kIHJlc3BvbnNpdmUgSW5zdGFncmFtIGZlZWRzIGZyb20gbXVsdGlwbGUgYWNjb3VudHMuIFN1cHBvcnRzIEluc3RhZ3JhbSBvRW1iZWRzLlwiLCBcImNvb2tlcnlcIiksXHJcbiAgICAgICAgc2x1ZzogXCJpbnN0YWdyYW0tZmVlZFwiXHJcbiAgICB9LFxyXG5dO1xyXG5cclxuY29uc3Qgb2JqZWN0RXhpc3RzSW5BcnJheSA9IChvYmosIGFycmF5KSA9PiB7XHJcbiAgICByZXR1cm4gYXJyYXkuc29tZSgoZWwpID0+IGVsLnNsdWcgPT09IG9iai5zbHVnKTtcclxufVxyXG5cclxuY29uc3QgVXNlZnVsUGx1Z2lucyA9ICgpID0+IHtcclxuICAgIGNvbnN0IFtidXR0b25TdGF0ZSwgc2V0QnV0dG9uU3RhdGVdID0gdXNlU3RhdGUoKCkgPT4ge1xyXG4gICAgICAgIGNvbnN0IGluaXRpYWxTdGF0ZSA9IHt9O1xyXG4gICAgICAgIHBsdWdpbkxpc3QuZm9yRWFjaChwbHVnaW4gPT4ge1xyXG4gICAgICAgICAgICBpbml0aWFsU3RhdGVbcGx1Z2luLnNsdWddID0gJ0luc3RhbGwnO1xyXG4gICAgICAgIH0pO1xyXG4gICAgICAgIHJldHVybiBpbml0aWFsU3RhdGU7XHJcbiAgICB9KTtcclxuXHJcbiAgICBjb25zdCBbYWN0aXZhdGVVcmxzLCBzZXRBY3RpdmF0ZVVybHNdID0gdXNlU3RhdGUoe30pO1xyXG5cclxuICAgIHVzZUVmZmVjdCgoKSA9PiB7XHJcbiAgICAgICAgY29uc3QgYWN0aXZlUGx1Z2lucyA9IGN3X2Rhc2hib2FyZC5hY3RpdmVQbHVnaW5zO1xyXG4gICAgICAgIGNvbnN0IGluYWN0aXZlUGx1Z2lucyA9IGN3X2Rhc2hib2FyZC5pbmFjdGl2ZVBsdWdpbnM7XHJcbiAgICAgICAgY29uc3QgbmV3QnV0dG9uU3RhdGUgPSB7fTtcclxuXHJcbiAgICAgICAgLy8gU2V0IHN0YXRlIGZvciBhY3RpdmUgcGx1Z2luc1xyXG4gICAgICAgIGFjdGl2ZVBsdWdpbnMuZm9yRWFjaChwbHVnaW4gPT4ge1xyXG4gICAgICAgICAgICBpZiAob2JqZWN0RXhpc3RzSW5BcnJheShwbHVnaW4sIHBsdWdpbkxpc3QpKSB7XHJcbiAgICAgICAgICAgICAgICBuZXdCdXR0b25TdGF0ZVtwbHVnaW4uc2x1Z10gPSAnQWN0aXZhdGVkJztcclxuICAgICAgICAgICAgfVxyXG4gICAgICAgIH0pO1xyXG5cclxuICAgICAgICAvLyBTZXQgc3RhdGUgZm9yIGluYWN0aXZlIHBsdWdpbnNcclxuICAgICAgICBpbmFjdGl2ZVBsdWdpbnMuZm9yRWFjaChwbHVnaW4gPT4ge1xyXG4gICAgICAgICAgICBpZiAob2JqZWN0RXhpc3RzSW5BcnJheShwbHVnaW4sIHBsdWdpbkxpc3QpKSB7XHJcbiAgICAgICAgICAgICAgICBuZXdCdXR0b25TdGF0ZVtwbHVnaW4uc2x1Z10gPSAnQWN0aXZhdGUnO1xyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgfSk7XHJcblxyXG4gICAgICAgIHNldEJ1dHRvblN0YXRlKHByZXZTdGF0ZSA9PiAoe1xyXG4gICAgICAgICAgICAuLi5wcmV2U3RhdGUsXHJcbiAgICAgICAgICAgIC4uLm5ld0J1dHRvblN0YXRlXHJcbiAgICAgICAgfSkpO1xyXG5cclxuICAgICAgICBjb25zdCB1cmxzID0ge307XHJcbiAgICAgICAgaW5hY3RpdmVQbHVnaW5zLmZvckVhY2goKHBsdWdpbikgPT4ge1xyXG4gICAgICAgICAgICBpZiAob2JqZWN0RXhpc3RzSW5BcnJheShwbHVnaW4sIHBsdWdpbkxpc3QpKSB7XHJcbiAgICAgICAgICAgICAgICBjb25zdCB1cmwgPSBwbHVnaW4udXJsLnJlcGxhY2UoLyZhbXA7L2csICcmJyk7XHJcbiAgICAgICAgICAgICAgICB1cmxzW3BsdWdpbi5zbHVnXSA9IHVybDtcclxuICAgICAgICAgICAgfVxyXG4gICAgICAgIH0pO1xyXG5cclxuICAgICAgICBzZXRBY3RpdmF0ZVVybHModXJscyk7XHJcbiAgICB9LCBbXSk7XHJcblxyXG4gICAgY29uc3QgaW5zdGFsbFBsdWdpbiA9IChzbHVnKSA9PiB7XHJcbiAgICAgICAgc2V0QnV0dG9uU3RhdGUoKHByZXZTdGF0ZSkgPT4gKHtcclxuICAgICAgICAgICAgLi4ucHJldlN0YXRlLFxyXG4gICAgICAgICAgICBbc2x1Z106ICdJbnN0YWxsaW5nLi4uJ1xyXG4gICAgICAgIH0pKTtcclxuXHJcbiAgICAgICAgd3AudXBkYXRlcy5pbnN0YWxsUGx1Z2luKHtcclxuICAgICAgICAgICAgc2x1Zzogc2x1ZyxcclxuICAgICAgICAgICAgc3VjY2VzczogKHJlc3BvbnNlKSA9PiB7XHJcbiAgICAgICAgICAgICAgICBzZXRBY3RpdmF0ZVVybHMoKHByZXZVcmxzKSA9PiAoe1xyXG4gICAgICAgICAgICAgICAgICAgIC4uLnByZXZVcmxzLFxyXG4gICAgICAgICAgICAgICAgICAgIFtzbHVnXTogcmVzcG9uc2UuYWN0aXZhdGVVcmxcclxuICAgICAgICAgICAgICAgIH0pKTtcclxuICAgICAgICAgICAgICAgIHNldEJ1dHRvblN0YXRlKChwcmV2U3RhdGUpID0+ICh7XHJcbiAgICAgICAgICAgICAgICAgICAgLi4ucHJldlN0YXRlLFxyXG4gICAgICAgICAgICAgICAgICAgIFtzbHVnXTogJ0FjdGl2YXRlJ1xyXG4gICAgICAgICAgICAgICAgfSkpO1xyXG4gICAgICAgICAgICB9LFxyXG4gICAgICAgICAgICBlcnJvcjogKGVycm9yKSA9PiB7XHJcbiAgICAgICAgICAgICAgICBjb25zb2xlLmVycm9yKGVycm9yKTtcclxuICAgICAgICAgICAgICAgIHNldEJ1dHRvblN0YXRlKChwcmV2U3RhdGUpID0+ICh7XHJcbiAgICAgICAgICAgICAgICAgICAgLi4ucHJldlN0YXRlLFxyXG4gICAgICAgICAgICAgICAgICAgIFtzbHVnXTogJ0luc3RhbGwnXHJcbiAgICAgICAgICAgICAgICB9KSk7XHJcbiAgICAgICAgICAgIH1cclxuICAgICAgICB9KTtcclxuICAgIH1cclxuXHJcbiAgICBjb25zdCBhY3RpdmF0ZVBsdWdpbiA9IGFzeW5jIChzbHVnKSA9PiB7XHJcbiAgICAgICAgc2V0QnV0dG9uU3RhdGUoKHByZXZTdGF0ZSkgPT4gKHtcclxuICAgICAgICAgICAgLi4ucHJldlN0YXRlLFxyXG4gICAgICAgICAgICBbc2x1Z106ICdBY3RpdmF0aW5nLi4uJ1xyXG4gICAgICAgIH0pKTtcclxuXHJcbiAgICAgICAgY29uc3QgdXJsID0gYWN0aXZhdGVVcmxzW3NsdWddO1xyXG4gICAgICAgIGlmICh1cmwpIHtcclxuICAgICAgICAgICAgdHJ5IHtcclxuICAgICAgICAgICAgICAgIGNvbnN0IHJlc3BvbnNlID0gYXdhaXQgZmV0Y2godXJsLCB7XHJcbiAgICAgICAgICAgICAgICAgICAgbWV0aG9kOiAnUE9TVCcsXHJcbiAgICAgICAgICAgICAgICAgICAgaGVhZGVyczoge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAnQ29udGVudC1UeXBlJzogJ2FwcGxpY2F0aW9uL3gtd3d3LWZvcm0tdXJsZW5jb2RlZCcsXHJcbiAgICAgICAgICAgICAgICAgICAgfSxcclxuICAgICAgICAgICAgICAgICAgICBib2R5OiBuZXcgVVJMU2VhcmNoUGFyYW1zKHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgX3dwbm9uY2U6IG5ldyBVUkwodXJsKS5zZWFyY2hQYXJhbXMuZ2V0KCdfd3Bub25jZScpLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICBhY3Rpb246ICdhY3RpdmF0ZScsXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIHBsdWdpbjogbmV3IFVSTCh1cmwpLnNlYXJjaFBhcmFtcy5nZXQoJ3BsdWdpbicpLFxyXG4gICAgICAgICAgICAgICAgICAgIH0pLnRvU3RyaW5nKCksXHJcbiAgICAgICAgICAgICAgICB9KTtcclxuXHJcbiAgICAgICAgICAgICAgICBpZiAoIXJlc3BvbnNlLm9rKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgdGhyb3cgbmV3IEVycm9yKGBIVFRQIGVycm9yISBzdGF0dXM6ICR7cmVzcG9uc2Uuc3RhdHVzfWApO1xyXG4gICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgc2V0QnV0dG9uU3RhdGUoKHByZXZTdGF0ZSkgPT4gKHtcclxuICAgICAgICAgICAgICAgICAgICAuLi5wcmV2U3RhdGUsXHJcbiAgICAgICAgICAgICAgICAgICAgW3NsdWddOiAnQWN0aXZhdGVkJ1xyXG4gICAgICAgICAgICAgICAgfSkpO1xyXG4gICAgICAgICAgICB9IGNhdGNoIChlcnJvcikge1xyXG4gICAgICAgICAgICAgICAgc2V0QnV0dG9uU3RhdGUoKHByZXZTdGF0ZSkgPT4gKHtcclxuICAgICAgICAgICAgICAgICAgICAuLi5wcmV2U3RhdGUsXHJcbiAgICAgICAgICAgICAgICAgICAgW3NsdWddOiAnQWN0aXZhdGUnXHJcbiAgICAgICAgICAgICAgICB9KSk7XHJcbiAgICAgICAgICAgIH1cclxuICAgICAgICB9XHJcbiAgICB9XHJcblxyXG4gICAgcmV0dXJuIChcclxuICAgICAgICA8ZGl2IGNsYXNzTmFtZT1cImN3LXBsdWdpbi1saXN0LXdyYXBwZXJcIj5cclxuICAgICAgICAgICAge3BsdWdpbkxpc3QubWFwKChwbHVnaW4sIGluZGV4KSA9PiAoXHJcbiAgICAgICAgICAgICAgICA8ZGl2IGNsYXNzTmFtZT1cImN3LXBsdWdpbi1saXN0XCIga2V5PXtpbmRleH0+XHJcbiAgICAgICAgICAgICAgICAgICAgPGRpdiBjbGFzc05hbWU9XCJwbHVnaW4tZGV0YWlsXCI+XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIDxkaXYgY2xhc3NOYW1lPVwiY3ctcGx1Z2luLXRpdGxlXCI+XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICA8SWNvbiBpY29uPSdwbHVnaW5MaXN0JyBsYWJlbD17cGx1Z2luLnBsdWdpbk5hbWV9IC8+XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIDwvZGl2PlxyXG4gICAgICAgICAgICAgICAgICAgICAgICA8cCBjbGFzc05hbWU9XCJkZXNjcmlwdGlvblwiPntwbHVnaW4uZGVzY3JpcHRpb259PC9wPlxyXG4gICAgICAgICAgICAgICAgICAgIDwvZGl2PlxyXG4gICAgICAgICAgICAgICAgICAgIDxkaXYgY2xhc3NOYW1lPVwiaW5zZXJ0LWJ1dHRvblwiPlxyXG4gICAgICAgICAgICAgICAgICAgICAgICB7YnV0dG9uU3RhdGVbcGx1Z2luLnNsdWddID09PSAnSW5zdGFsbCcgJiYgKFxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgPGJ1dHRvbiBjbGFzc05hbWU9XCJjdy1idXR0b24tYnRuIG91dGxpbmVcIiBvbkNsaWNrPXsoKSA9PiBpbnN0YWxsUGx1Z2luKHBsdWdpbi5zbHVnKX0+XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAge19fKCdJbnN0YWxsJywgJ2Nvb2tlcnknKX1cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIDwvYnV0dG9uPlxyXG4gICAgICAgICAgICAgICAgICAgICAgICApfVxyXG4gICAgICAgICAgICAgICAgICAgICAgICB7YnV0dG9uU3RhdGVbcGx1Z2luLnNsdWddID09PSAnSW5zdGFsbGluZy4uLicgJiYgKFxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgPGJ1dHRvbiBjbGFzc05hbWU9XCJjdy1idXR0b24tYnRuIG91dGxpbmVcIiBkaXNhYmxlZD5cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICB7X18oJ0luc3RhbGxpbmcuLi4nLCAnY29va2VyeScpfVxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgPC9idXR0b24+XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICl9XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIHtidXR0b25TdGF0ZVtwbHVnaW4uc2x1Z10gPT09ICdBY3RpdmF0ZScgJiYgKFxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgPGJ1dHRvbiBjbGFzc05hbWU9XCJjdy1idXR0b24tYnRuIG91dGxpbmVcIiBvbkNsaWNrPXsoKSA9PiBhY3RpdmF0ZVBsdWdpbihwbHVnaW4uc2x1Zyl9PlxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIHtfXygnQWN0aXZhdGUnLCAnY29va2VyeScpfVxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgPC9idXR0b24+XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICl9XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIHtidXR0b25TdGF0ZVtwbHVnaW4uc2x1Z10gPT09ICdBY3RpdmF0aW5nLi4uJyAmJiAoXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICA8YnV0dG9uIGNsYXNzTmFtZT1cImN3LWJ1dHRvbi1idG4gb3V0bGluZVwiIGRpc2FibGVkPlxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIHtfXygnQWN0aXZhdGluZy4uLicsICdjb29rZXJ5Jyl9XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICA8L2J1dHRvbj5cclxuICAgICAgICAgICAgICAgICAgICAgICAgKX1cclxuICAgICAgICAgICAgICAgICAgICAgICAge2J1dHRvblN0YXRlW3BsdWdpbi5zbHVnXSA9PT0gJ0FjdGl2YXRlZCcgJiYgKFxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgPGJ1dHRvbiBjbGFzc05hbWU9XCJjdy1idXR0b24tYnRuIHByaW1hcnktYnRuIGRlYWN0aXZhdGVcIiBkaXNhYmxlZD5cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICB7X18oJ0FjdGl2YXRlZCcsICdjb29rZXJ5Jyl9XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICA8L2J1dHRvbj5cclxuICAgICAgICAgICAgICAgICAgICAgICAgKX1cclxuICAgICAgICAgICAgICAgICAgICA8L2Rpdj5cclxuICAgICAgICAgICAgICAgIDwvZGl2PlxyXG4gICAgICAgICAgICApKX1cclxuICAgICAgICA8L2Rpdj5cclxuICAgICk7XHJcbn1cclxuXHJcbmV4cG9ydCBkZWZhdWx0IFVzZWZ1bFBsdWdpbnM7XHJcbiIsImltcG9ydCB7IHVzZVN0YXRlIH0gZnJvbSAncmVhY3QnO1xyXG5pbXBvcnQgeyBJY29uLCBUYWIgfSBmcm9tICcuLi9jb21wb25lbnRzJztcclxuaW1wb3J0IEhvbWVwYWdlIGZyb20gXCIuL0hvbWVcIjtcclxuaW1wb3J0IExpY2Vuc2UgZnJvbSAnLi9MaWNlbnNlJztcclxuaW1wb3J0IE9mZmVycyBmcm9tICcuL09mZmVycyc7XHJcbmltcG9ydCBVc2VmdWxQbHVnaW5zIGZyb20gJy4vVXNlZnVsUGx1Z2lucyc7XHJcbmltcG9ydCBTdGFydGVyU2l0ZXMgZnJvbSAnLi9TdGFydGVyU2l0ZXMnO1xyXG5pbXBvcnQgRkFRIGZyb20gJy4vRkFRJztcclxuaW1wb3J0IHsgVG9hc3RlciB9IGZyb20gJ3Nvbm5lcic7XHJcbmltcG9ydCB7IF9fIH0gZnJvbSAnQHdvcmRwcmVzcy9pMThuJztcclxuXHJcbmZ1bmN0aW9uIERhc2hib2FyZCgpIHtcclxuICAgIGNvbnN0IFthY3RpdmVUYWJUaXRsZSwgc2V0QWN0aXZlVGFiVGl0bGVdID0gdXNlU3RhdGUoJ0hvbWUnKTtcclxuXHJcbiAgICBjb25zdCB0YWJzRGF0YSA9IFtcclxuICAgICAgICB7XHJcbiAgICAgICAgICAgIHRpdGxlOiBfXygnSG9tZScsICdjb29rZXJ5JyksXHJcbiAgICAgICAgICAgIGljb246IDxJY29uIGljb249XCJob21lXCIgLz4sXHJcbiAgICAgICAgICAgIGNvbnRlbnQ6IDxIb21lcGFnZSAvPlxyXG4gICAgICAgIH0sXHJcbiAgICAgICAge1xyXG4gICAgICAgICAgICB0aXRsZTogX18oJ1N0YXJ0ZXIgU2l0ZXMnLCAnY29va2VyeScpLFxyXG4gICAgICAgICAgICBpY29uOiA8SWNvbiBpY29uPVwiZ2xvYmVcIiAvPixcclxuICAgICAgICAgICAgY29udGVudDogPFN0YXJ0ZXJTaXRlcyAvPlxyXG4gICAgICAgIH0sXHJcbiAgICAgICAge1xyXG4gICAgICAgICAgICB0aXRsZTogX18oJ09mZmVycycsICdjb29rZXJ5JyksXHJcbiAgICAgICAgICAgIGljb246IDxJY29uIGljb249XCJvZmZlcnNcIiAvPixcclxuICAgICAgICAgICAgY29udGVudDogPE9mZmVycyAvPlxyXG4gICAgICAgIH0sXHJcbiAgICAgICAge1xyXG4gICAgICAgICAgICB0aXRsZTogX18oJ0ZBUXMnLCAnY29va2VyeScpLFxyXG4gICAgICAgICAgICBpY29uOiA8SWNvbiBpY29uPVwic3VwcG9ydFwiIC8+LFxyXG4gICAgICAgICAgICBjb250ZW50OiA8RkFRIC8+XHJcbiAgICAgICAgfSxcclxuICAgICAgICB7XHJcbiAgICAgICAgICAgIHRpdGxlOiBfXygnVXNlZnVsIFBsdWdpbnMnLCAnY29va2VyeScpLFxyXG4gICAgICAgICAgICBpY29uOiA8SWNvbiBpY29uPVwicGx1Z2luc1wiIC8+LFxyXG4gICAgICAgICAgICBjb250ZW50OiA8VXNlZnVsUGx1Z2lucyAvPlxyXG4gICAgICAgIH0sXHJcbiAgICAgICAge1xyXG4gICAgICAgICAgICB0aXRsZTogX18oJ0xpY2Vuc2UnLCAnY29va2VyeScpLFxyXG4gICAgICAgICAgICBpY29uOiA8SWNvbiBpY29uPVwibGljZW5zZVwiIC8+LFxyXG4gICAgICAgICAgICBjb250ZW50OiA8TGljZW5zZSAvPlxyXG4gICAgICAgIH0sXHJcbiAgICBdO1xyXG5cclxuICAgIGNvbnN0IGhhbmRsZVRhYkNoYW5nZSA9ICh0aXRsZSkgPT4ge1xyXG4gICAgICAgIHNldEFjdGl2ZVRhYlRpdGxlKHRpdGxlKTtcclxuICAgIH07XHJcblxyXG4gICAgcmV0dXJuIChcclxuICAgICAgICA8PlxyXG4gICAgICAgICAgICA8VGFiXHJcbiAgICAgICAgICAgICAgICB0YWJzRGF0YT17dGFic0RhdGF9XHJcbiAgICAgICAgICAgICAgICBvbkNoYW5nZT17aGFuZGxlVGFiQ2hhbmdlfVxyXG4gICAgICAgICAgICAgICAgYWN0aXZlVGFiVGl0bGU9e2FjdGl2ZVRhYlRpdGxlfVxyXG4gICAgICAgICAgICAvPlxyXG4gICAgICAgICAgICA8VG9hc3RlciByaWNoQ29sb3JzIGNsb3NlQnV0dG9uIC8+XHJcblxyXG4gICAgICAgIDwvPlxyXG4gICAgKTtcclxufVxyXG5cclxuZXhwb3J0IGRlZmF1bHQgRGFzaGJvYXJkO1xyXG4iLCIvLyBleHRyYWN0ZWQgYnkgbWluaS1jc3MtZXh0cmFjdC1wbHVnaW5cbmV4cG9ydCB7fTsiLCJtb2R1bGUuZXhwb3J0cyA9IHdpbmRvd1tcIlJlYWN0XCJdOyIsIm1vZHVsZS5leHBvcnRzID0gd2luZG93W1wiUmVhY3RET01cIl07IiwibW9kdWxlLmV4cG9ydHMgPSB3aW5kb3dbXCJ3cFwiXVtcImNvbXBvbmVudHNcIl07IiwibW9kdWxlLmV4cG9ydHMgPSB3aW5kb3dbXCJ3cFwiXVtcImRvbVJlYWR5XCJdOyIsIm1vZHVsZS5leHBvcnRzID0gd2luZG93W1wid3BcIl1bXCJlbGVtZW50XCJdOyIsIm1vZHVsZS5leHBvcnRzID0gd2luZG93W1wid3BcIl1bXCJpMThuXCJdOyIsIlwidXNlIGNsaWVudFwiO2ltcG9ydCBlIGZyb21cInJlYWN0XCI7aW1wb3J0IEd0IGZyb21cInJlYWN0LWRvbVwiO2ltcG9ydCBFIGZyb21cInJlYWN0XCI7dmFyIEN0PXM9Pntzd2l0Y2gocyl7Y2FzZVwic3VjY2Vzc1wiOnJldHVybiAkdDtjYXNlXCJpbmZvXCI6cmV0dXJuIF90O2Nhc2VcIndhcm5pbmdcIjpyZXR1cm4gV3Q7Y2FzZVwiZXJyb3JcIjpyZXR1cm4gVXQ7ZGVmYXVsdDpyZXR1cm4gbnVsbH19LEZ0PUFycmF5KDEyKS5maWxsKDApLEl0PSh7dmlzaWJsZTpzfSk9PkUuY3JlYXRlRWxlbWVudChcImRpdlwiLHtjbGFzc05hbWU6XCJzb25uZXItbG9hZGluZy13cmFwcGVyXCIsXCJkYXRhLXZpc2libGVcIjpzfSxFLmNyZWF0ZUVsZW1lbnQoXCJkaXZcIix7Y2xhc3NOYW1lOlwic29ubmVyLXNwaW5uZXJcIn0sRnQubWFwKChvLHQpPT5FLmNyZWF0ZUVsZW1lbnQoXCJkaXZcIix7Y2xhc3NOYW1lOlwic29ubmVyLWxvYWRpbmctYmFyXCIsa2V5OmBzcGlubmVyLWJhci0ke3R9YH0pKSkpLCR0PUUuY3JlYXRlRWxlbWVudChcInN2Z1wiLHt4bWxuczpcImh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnXCIsdmlld0JveDpcIjAgMCAyMCAyMFwiLGZpbGw6XCJjdXJyZW50Q29sb3JcIixoZWlnaHQ6XCIyMFwiLHdpZHRoOlwiMjBcIn0sRS5jcmVhdGVFbGVtZW50KFwicGF0aFwiLHtmaWxsUnVsZTpcImV2ZW5vZGRcIixkOlwiTTEwIDE4YTggOCAwIDEwMC0xNiA4IDggMCAwMDAgMTZ6bTMuODU3LTkuODA5YS43NS43NSAwIDAwLTEuMjE0LS44ODJsLTMuNDgzIDQuNzktMS44OC0xLjg4YS43NS43NSAwIDEwLTEuMDYgMS4wNjFsMi41IDIuNWEuNzUuNzUgMCAwMDEuMTM3LS4wODlsNC01LjV6XCIsY2xpcFJ1bGU6XCJldmVub2RkXCJ9KSksV3Q9RS5jcmVhdGVFbGVtZW50KFwic3ZnXCIse3htbG5zOlwiaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmdcIix2aWV3Qm94OlwiMCAwIDI0IDI0XCIsZmlsbDpcImN1cnJlbnRDb2xvclwiLGhlaWdodDpcIjIwXCIsd2lkdGg6XCIyMFwifSxFLmNyZWF0ZUVsZW1lbnQoXCJwYXRoXCIse2ZpbGxSdWxlOlwiZXZlbm9kZFwiLGQ6XCJNOS40MDEgMy4wMDNjMS4xNTUtMiA0LjA0My0yIDUuMTk3IDBsNy4zNTUgMTIuNzQ4YzEuMTU0IDItLjI5IDQuNS0yLjU5OSA0LjVINC42NDVjLTIuMzA5IDAtMy43NTItMi41LTIuNTk4LTQuNUw5LjQgMy4wMDN6TTEyIDguMjVhLjc1Ljc1IDAgMDEuNzUuNzV2My43NWEuNzUuNzUgMCAwMS0xLjUgMFY5YS43NS43NSAwIDAxLjc1LS43NXptMCA4LjI1YS43NS43NSAwIDEwMC0xLjUuNzUuNzUgMCAwMDAgMS41elwiLGNsaXBSdWxlOlwiZXZlbm9kZFwifSkpLF90PUUuY3JlYXRlRWxlbWVudChcInN2Z1wiLHt4bWxuczpcImh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnXCIsdmlld0JveDpcIjAgMCAyMCAyMFwiLGZpbGw6XCJjdXJyZW50Q29sb3JcIixoZWlnaHQ6XCIyMFwiLHdpZHRoOlwiMjBcIn0sRS5jcmVhdGVFbGVtZW50KFwicGF0aFwiLHtmaWxsUnVsZTpcImV2ZW5vZGRcIixkOlwiTTE4IDEwYTggOCAwIDExLTE2IDAgOCA4IDAgMDExNiAwem0tNy00YTEgMSAwIDExLTIgMCAxIDEgMCAwMTIgMHpNOSA5YS43NS43NSAwIDAwMCAxLjVoLjI1M2EuMjUuMjUgMCAwMS4yNDQuMzA0bC0uNDU5IDIuMDY2QTEuNzUgMS43NSAwIDAwMTAuNzQ3IDE1SDExYS43NS43NSAwIDAwMC0xLjVoLS4yNTNhLjI1LjI1IDAgMDEtLjI0NC0uMzA0bC40NTktMi4wNjZBMS43NSAxLjc1IDAgMDA5LjI1MyA5SDl6XCIsY2xpcFJ1bGU6XCJldmVub2RkXCJ9KSksVXQ9RS5jcmVhdGVFbGVtZW50KFwic3ZnXCIse3htbG5zOlwiaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmdcIix2aWV3Qm94OlwiMCAwIDIwIDIwXCIsZmlsbDpcImN1cnJlbnRDb2xvclwiLGhlaWdodDpcIjIwXCIsd2lkdGg6XCIyMFwifSxFLmNyZWF0ZUVsZW1lbnQoXCJwYXRoXCIse2ZpbGxSdWxlOlwiZXZlbm9kZFwiLGQ6XCJNMTggMTBhOCA4IDAgMTEtMTYgMCA4IDggMCAwMTE2IDB6bS04LTVhLjc1Ljc1IDAgMDEuNzUuNzV2NC41YS43NS43NSAwIDAxLTEuNSAwdi00LjVBLjc1Ljc1IDAgMDExMCA1em0wIDEwYTEgMSAwIDEwMC0yIDEgMSAwIDAwMCAyelwiLGNsaXBSdWxlOlwiZXZlbm9kZFwifSkpO2ltcG9ydCBrdCBmcm9tXCJyZWFjdFwiO3ZhciBEdD0oKT0+e2xldFtzLG9dPWt0LnVzZVN0YXRlKGRvY3VtZW50LmhpZGRlbik7cmV0dXJuIGt0LnVzZUVmZmVjdCgoKT0+e2xldCB0PSgpPT57byhkb2N1bWVudC5oaWRkZW4pfTtyZXR1cm4gZG9jdW1lbnQuYWRkRXZlbnRMaXN0ZW5lcihcInZpc2liaWxpdHljaGFuZ2VcIix0KSwoKT0+d2luZG93LnJlbW92ZUV2ZW50TGlzdGVuZXIoXCJ2aXNpYmlsaXR5Y2hhbmdlXCIsdCl9LFtdKSxzfTt2YXIgY3Q9MSx1dD1jbGFzc3tjb25zdHJ1Y3Rvcigpe3RoaXMuc3Vic2NyaWJlPW89Pih0aGlzLnN1YnNjcmliZXJzLnB1c2gobyksKCk9PntsZXQgdD10aGlzLnN1YnNjcmliZXJzLmluZGV4T2Yobyk7dGhpcy5zdWJzY3JpYmVycy5zcGxpY2UodCwxKX0pO3RoaXMucHVibGlzaD1vPT57dGhpcy5zdWJzY3JpYmVycy5mb3JFYWNoKHQ9PnQobykpfTt0aGlzLmFkZFRvYXN0PW89Pnt0aGlzLnB1Ymxpc2gobyksdGhpcy50b2FzdHM9Wy4uLnRoaXMudG9hc3RzLG9dfTt0aGlzLmNyZWF0ZT1vPT57dmFyIGI7bGV0e21lc3NhZ2U6dCwuLi5ufT1vLGg9dHlwZW9mKG89PW51bGw/dm9pZCAwOm8uaWQpPT1cIm51bWJlclwifHwoKGI9by5pZCk9PW51bGw/dm9pZCAwOmIubGVuZ3RoKT4wP28uaWQ6Y3QrKyx1PXRoaXMudG9hc3RzLmZpbmQoZD0+ZC5pZD09PWgpLGc9by5kaXNtaXNzaWJsZT09PXZvaWQgMD8hMDpvLmRpc21pc3NpYmxlO3JldHVybiB1P3RoaXMudG9hc3RzPXRoaXMudG9hc3RzLm1hcChkPT5kLmlkPT09aD8odGhpcy5wdWJsaXNoKHsuLi5kLC4uLm8saWQ6aCx0aXRsZTp0fSksey4uLmQsLi4ubyxpZDpoLGRpc21pc3NpYmxlOmcsdGl0bGU6dH0pOmQpOnRoaXMuYWRkVG9hc3Qoe3RpdGxlOnQsLi4ubixkaXNtaXNzaWJsZTpnLGlkOmh9KSxofTt0aGlzLmRpc21pc3M9bz0+KG98fHRoaXMudG9hc3RzLmZvckVhY2godD0+e3RoaXMuc3Vic2NyaWJlcnMuZm9yRWFjaChuPT5uKHtpZDp0LmlkLGRpc21pc3M6ITB9KSl9KSx0aGlzLnN1YnNjcmliZXJzLmZvckVhY2godD0+dCh7aWQ6byxkaXNtaXNzOiEwfSkpLG8pO3RoaXMubWVzc2FnZT0obyx0KT0+dGhpcy5jcmVhdGUoey4uLnQsbWVzc2FnZTpvfSk7dGhpcy5lcnJvcj0obyx0KT0+dGhpcy5jcmVhdGUoey4uLnQsbWVzc2FnZTpvLHR5cGU6XCJlcnJvclwifSk7dGhpcy5zdWNjZXNzPShvLHQpPT50aGlzLmNyZWF0ZSh7Li4udCx0eXBlOlwic3VjY2Vzc1wiLG1lc3NhZ2U6b30pO3RoaXMuaW5mbz0obyx0KT0+dGhpcy5jcmVhdGUoey4uLnQsdHlwZTpcImluZm9cIixtZXNzYWdlOm99KTt0aGlzLndhcm5pbmc9KG8sdCk9PnRoaXMuY3JlYXRlKHsuLi50LHR5cGU6XCJ3YXJuaW5nXCIsbWVzc2FnZTpvfSk7dGhpcy5sb2FkaW5nPShvLHQpPT50aGlzLmNyZWF0ZSh7Li4udCx0eXBlOlwibG9hZGluZ1wiLG1lc3NhZ2U6b30pO3RoaXMucHJvbWlzZT0obyx0KT0+e2lmKCF0KXJldHVybjtsZXQgbjt0LmxvYWRpbmchPT12b2lkIDAmJihuPXRoaXMuY3JlYXRlKHsuLi50LHByb21pc2U6byx0eXBlOlwibG9hZGluZ1wiLG1lc3NhZ2U6dC5sb2FkaW5nLGRlc2NyaXB0aW9uOnR5cGVvZiB0LmRlc2NyaXB0aW9uIT1cImZ1bmN0aW9uXCI/dC5kZXNjcmlwdGlvbjp2b2lkIDB9KSk7bGV0IGg9byBpbnN0YW5jZW9mIFByb21pc2U/bzpvKCksdT1uIT09dm9pZCAwO3JldHVybiBoLnRoZW4oYXN5bmMgZz0+e2lmKE90KGcpJiYhZy5vayl7dT0hMTtsZXQgYj10eXBlb2YgdC5lcnJvcj09XCJmdW5jdGlvblwiP2F3YWl0IHQuZXJyb3IoYEhUVFAgZXJyb3IhIHN0YXR1czogJHtnLnN0YXR1c31gKTp0LmVycm9yLGQ9dHlwZW9mIHQuZGVzY3JpcHRpb249PVwiZnVuY3Rpb25cIj9hd2FpdCB0LmRlc2NyaXB0aW9uKGBIVFRQIGVycm9yISBzdGF0dXM6ICR7Zy5zdGF0dXN9YCk6dC5kZXNjcmlwdGlvbjt0aGlzLmNyZWF0ZSh7aWQ6bix0eXBlOlwiZXJyb3JcIixtZXNzYWdlOmIsZGVzY3JpcHRpb246ZH0pfWVsc2UgaWYodC5zdWNjZXNzIT09dm9pZCAwKXt1PSExO2xldCBiPXR5cGVvZiB0LnN1Y2Nlc3M9PVwiZnVuY3Rpb25cIj9hd2FpdCB0LnN1Y2Nlc3MoZyk6dC5zdWNjZXNzLGQ9dHlwZW9mIHQuZGVzY3JpcHRpb249PVwiZnVuY3Rpb25cIj9hd2FpdCB0LmRlc2NyaXB0aW9uKGcpOnQuZGVzY3JpcHRpb247dGhpcy5jcmVhdGUoe2lkOm4sdHlwZTpcInN1Y2Nlc3NcIixtZXNzYWdlOmIsZGVzY3JpcHRpb246ZH0pfX0pLmNhdGNoKGFzeW5jIGc9PntpZih0LmVycm9yIT09dm9pZCAwKXt1PSExO2xldCBiPXR5cGVvZiB0LmVycm9yPT1cImZ1bmN0aW9uXCI/YXdhaXQgdC5lcnJvcihnKTp0LmVycm9yLGQ9dHlwZW9mIHQuZGVzY3JpcHRpb249PVwiZnVuY3Rpb25cIj9hd2FpdCB0LmRlc2NyaXB0aW9uKGcpOnQuZGVzY3JpcHRpb247dGhpcy5jcmVhdGUoe2lkOm4sdHlwZTpcImVycm9yXCIsbWVzc2FnZTpiLGRlc2NyaXB0aW9uOmR9KX19KS5maW5hbGx5KCgpPT57dmFyIGc7dSYmKHRoaXMuZGlzbWlzcyhuKSxuPXZvaWQgMCksKGc9dC5maW5hbGx5KT09bnVsbHx8Zy5jYWxsKHQpfSksbn07dGhpcy5jdXN0b209KG8sdCk9PntsZXQgbj0odD09bnVsbD92b2lkIDA6dC5pZCl8fGN0Kys7cmV0dXJuIHRoaXMuY3JlYXRlKHtqc3g6byhuKSxpZDpuLC4uLnR9KSxufTt0aGlzLnN1YnNjcmliZXJzPVtdLHRoaXMudG9hc3RzPVtdfX0sdj1uZXcgdXQsVnQ9KHMsbyk9PntsZXQgdD0obz09bnVsbD92b2lkIDA6by5pZCl8fGN0Kys7cmV0dXJuIHYuYWRkVG9hc3Qoe3RpdGxlOnMsLi4ubyxpZDp0fSksdH0sT3Q9cz0+cyYmdHlwZW9mIHM9PVwib2JqZWN0XCImJlwib2tcImluIHMmJnR5cGVvZiBzLm9rPT1cImJvb2xlYW5cIiYmXCJzdGF0dXNcImluIHMmJnR5cGVvZiBzLnN0YXR1cz09XCJudW1iZXJcIixLdD1WdCxYdD0oKT0+di50b2FzdHMsSnQ9T2JqZWN0LmFzc2lnbihLdCx7c3VjY2Vzczp2LnN1Y2Nlc3MsaW5mbzp2LmluZm8sd2FybmluZzp2Lndhcm5pbmcsZXJyb3I6di5lcnJvcixjdXN0b206di5jdXN0b20sbWVzc2FnZTp2Lm1lc3NhZ2UscHJvbWlzZTp2LnByb21pc2UsZGlzbWlzczp2LmRpc21pc3MsbG9hZGluZzp2LmxvYWRpbmd9LHtnZXRIaXN0b3J5Olh0fSk7ZnVuY3Rpb24gZnQocyx7aW5zZXJ0QXQ6b309e30pe2lmKCFzfHx0eXBlb2YgZG9jdW1lbnQ9PVwidW5kZWZpbmVkXCIpcmV0dXJuO2xldCB0PWRvY3VtZW50LmhlYWR8fGRvY3VtZW50LmdldEVsZW1lbnRzQnlUYWdOYW1lKFwiaGVhZFwiKVswXSxuPWRvY3VtZW50LmNyZWF0ZUVsZW1lbnQoXCJzdHlsZVwiKTtuLnR5cGU9XCJ0ZXh0L2Nzc1wiLG89PT1cInRvcFwiJiZ0LmZpcnN0Q2hpbGQ/dC5pbnNlcnRCZWZvcmUobix0LmZpcnN0Q2hpbGQpOnQuYXBwZW5kQ2hpbGQobiksbi5zdHlsZVNoZWV0P24uc3R5bGVTaGVldC5jc3NUZXh0PXM6bi5hcHBlbmRDaGlsZChkb2N1bWVudC5jcmVhdGVUZXh0Tm9kZShzKSl9ZnQoYDp3aGVyZShodG1sW2Rpcj1cImx0clwiXSksOndoZXJlKFtkYXRhLXNvbm5lci10b2FzdGVyXVtkaXI9XCJsdHJcIl0pey0tdG9hc3QtaWNvbi1tYXJnaW4tc3RhcnQ6IC0zcHg7LS10b2FzdC1pY29uLW1hcmdpbi1lbmQ6IDRweDstLXRvYXN0LXN2Zy1tYXJnaW4tc3RhcnQ6IC0xcHg7LS10b2FzdC1zdmctbWFyZ2luLWVuZDogMHB4Oy0tdG9hc3QtYnV0dG9uLW1hcmdpbi1zdGFydDogYXV0bzstLXRvYXN0LWJ1dHRvbi1tYXJnaW4tZW5kOiAwOy0tdG9hc3QtY2xvc2UtYnV0dG9uLXN0YXJ0OiAwOy0tdG9hc3QtY2xvc2UtYnV0dG9uLWVuZDogdW5zZXQ7LS10b2FzdC1jbG9zZS1idXR0b24tdHJhbnNmb3JtOiB0cmFuc2xhdGUoLTM1JSwgLTM1JSl9OndoZXJlKGh0bWxbZGlyPVwicnRsXCJdKSw6d2hlcmUoW2RhdGEtc29ubmVyLXRvYXN0ZXJdW2Rpcj1cInJ0bFwiXSl7LS10b2FzdC1pY29uLW1hcmdpbi1zdGFydDogNHB4Oy0tdG9hc3QtaWNvbi1tYXJnaW4tZW5kOiAtM3B4Oy0tdG9hc3Qtc3ZnLW1hcmdpbi1zdGFydDogMHB4Oy0tdG9hc3Qtc3ZnLW1hcmdpbi1lbmQ6IC0xcHg7LS10b2FzdC1idXR0b24tbWFyZ2luLXN0YXJ0OiAwOy0tdG9hc3QtYnV0dG9uLW1hcmdpbi1lbmQ6IGF1dG87LS10b2FzdC1jbG9zZS1idXR0b24tc3RhcnQ6IHVuc2V0Oy0tdG9hc3QtY2xvc2UtYnV0dG9uLWVuZDogMDstLXRvYXN0LWNsb3NlLWJ1dHRvbi10cmFuc2Zvcm06IHRyYW5zbGF0ZSgzNSUsIC0zNSUpfTp3aGVyZShbZGF0YS1zb25uZXItdG9hc3Rlcl0pe3Bvc2l0aW9uOmZpeGVkO3dpZHRoOnZhcigtLXdpZHRoKTtmb250LWZhbWlseTp1aS1zYW5zLXNlcmlmLHN5c3RlbS11aSwtYXBwbGUtc3lzdGVtLEJsaW5rTWFjU3lzdGVtRm9udCxTZWdvZSBVSSxSb2JvdG8sSGVsdmV0aWNhIE5ldWUsQXJpYWwsTm90byBTYW5zLHNhbnMtc2VyaWYsQXBwbGUgQ29sb3IgRW1vamksU2Vnb2UgVUkgRW1vamksU2Vnb2UgVUkgU3ltYm9sLE5vdG8gQ29sb3IgRW1vamk7LS1ncmF5MTogaHNsKDAsIDAlLCA5OSUpOy0tZ3JheTI6IGhzbCgwLCAwJSwgOTcuMyUpOy0tZ3JheTM6IGhzbCgwLCAwJSwgOTUuMSUpOy0tZ3JheTQ6IGhzbCgwLCAwJSwgOTMlKTstLWdyYXk1OiBoc2woMCwgMCUsIDkwLjklKTstLWdyYXk2OiBoc2woMCwgMCUsIDg4LjclKTstLWdyYXk3OiBoc2woMCwgMCUsIDg1LjglKTstLWdyYXk4OiBoc2woMCwgMCUsIDc4JSk7LS1ncmF5OTogaHNsKDAsIDAlLCA1Ni4xJSk7LS1ncmF5MTA6IGhzbCgwLCAwJSwgNTIuMyUpOy0tZ3JheTExOiBoc2woMCwgMCUsIDQzLjUlKTstLWdyYXkxMjogaHNsKDAsIDAlLCA5JSk7LS1ib3JkZXItcmFkaXVzOiA4cHg7Ym94LXNpemluZzpib3JkZXItYm94O3BhZGRpbmc6MDttYXJnaW46MDtsaXN0LXN0eWxlOm5vbmU7b3V0bGluZTpub25lO3otaW5kZXg6OTk5OTk5OTk5fTp3aGVyZShbZGF0YS1zb25uZXItdG9hc3Rlcl1bZGF0YS14LXBvc2l0aW9uPVwicmlnaHRcIl0pe3JpZ2h0Om1heCh2YXIoLS1vZmZzZXQpLGVudihzYWZlLWFyZWEtaW5zZXQtcmlnaHQpKX06d2hlcmUoW2RhdGEtc29ubmVyLXRvYXN0ZXJdW2RhdGEteC1wb3NpdGlvbj1cImxlZnRcIl0pe2xlZnQ6bWF4KHZhcigtLW9mZnNldCksZW52KHNhZmUtYXJlYS1pbnNldC1sZWZ0KSl9OndoZXJlKFtkYXRhLXNvbm5lci10b2FzdGVyXVtkYXRhLXgtcG9zaXRpb249XCJjZW50ZXJcIl0pe2xlZnQ6NTAlO3RyYW5zZm9ybTp0cmFuc2xhdGUoLTUwJSl9OndoZXJlKFtkYXRhLXNvbm5lci10b2FzdGVyXVtkYXRhLXktcG9zaXRpb249XCJ0b3BcIl0pe3RvcDptYXgodmFyKC0tb2Zmc2V0KSxlbnYoc2FmZS1hcmVhLWluc2V0LXRvcCkpfTp3aGVyZShbZGF0YS1zb25uZXItdG9hc3Rlcl1bZGF0YS15LXBvc2l0aW9uPVwiYm90dG9tXCJdKXtib3R0b206bWF4KHZhcigtLW9mZnNldCksZW52KHNhZmUtYXJlYS1pbnNldC1ib3R0b20pKX06d2hlcmUoW2RhdGEtc29ubmVyLXRvYXN0XSl7LS15OiB0cmFuc2xhdGVZKDEwMCUpOy0tbGlmdC1hbW91bnQ6IGNhbGModmFyKC0tbGlmdCkgKiB2YXIoLS1nYXApKTt6LWluZGV4OnZhcigtLXotaW5kZXgpO3Bvc2l0aW9uOmFic29sdXRlO29wYWNpdHk6MDt0cmFuc2Zvcm06dmFyKC0teSk7ZmlsdGVyOmJsdXIoMCk7dG91Y2gtYWN0aW9uOm5vbmU7dHJhbnNpdGlvbjp0cmFuc2Zvcm0gLjRzLG9wYWNpdHkgLjRzLGhlaWdodCAuNHMsYm94LXNoYWRvdyAuMnM7Ym94LXNpemluZzpib3JkZXItYm94O291dGxpbmU6bm9uZTtvdmVyZmxvdy13cmFwOmFueXdoZXJlfTp3aGVyZShbZGF0YS1zb25uZXItdG9hc3RdW2RhdGEtc3R5bGVkPVwidHJ1ZVwiXSl7cGFkZGluZzoxNnB4O2JhY2tncm91bmQ6dmFyKC0tbm9ybWFsLWJnKTtib3JkZXI6MXB4IHNvbGlkIHZhcigtLW5vcm1hbC1ib3JkZXIpO2NvbG9yOnZhcigtLW5vcm1hbC10ZXh0KTtib3JkZXItcmFkaXVzOnZhcigtLWJvcmRlci1yYWRpdXMpO2JveC1zaGFkb3c6MCA0cHggMTJweCAjMDAwMDAwMWE7d2lkdGg6dmFyKC0td2lkdGgpO2ZvbnQtc2l6ZToxM3B4O2Rpc3BsYXk6ZmxleDthbGlnbi1pdGVtczpjZW50ZXI7Z2FwOjZweH06d2hlcmUoW2RhdGEtc29ubmVyLXRvYXN0XTpmb2N1cy12aXNpYmxlKXtib3gtc2hhZG93OjAgNHB4IDEycHggIzAwMDAwMDFhLDAgMCAwIDJweCAjMDAwM306d2hlcmUoW2RhdGEtc29ubmVyLXRvYXN0XVtkYXRhLXktcG9zaXRpb249XCJ0b3BcIl0pe3RvcDowOy0teTogdHJhbnNsYXRlWSgtMTAwJSk7LS1saWZ0OiAxOy0tbGlmdC1hbW91bnQ6IGNhbGMoMSAqIHZhcigtLWdhcCkpfTp3aGVyZShbZGF0YS1zb25uZXItdG9hc3RdW2RhdGEteS1wb3NpdGlvbj1cImJvdHRvbVwiXSl7Ym90dG9tOjA7LS15OiB0cmFuc2xhdGVZKDEwMCUpOy0tbGlmdDogLTE7LS1saWZ0LWFtb3VudDogY2FsYyh2YXIoLS1saWZ0KSAqIHZhcigtLWdhcCkpfTp3aGVyZShbZGF0YS1zb25uZXItdG9hc3RdKSA6d2hlcmUoW2RhdGEtZGVzY3JpcHRpb25dKXtmb250LXdlaWdodDo0MDA7bGluZS1oZWlnaHQ6MS40O2NvbG9yOmluaGVyaXR9OndoZXJlKFtkYXRhLXNvbm5lci10b2FzdF0pIDp3aGVyZShbZGF0YS10aXRsZV0pe2ZvbnQtd2VpZ2h0OjUwMDtsaW5lLWhlaWdodDoxLjU7Y29sb3I6aW5oZXJpdH06d2hlcmUoW2RhdGEtc29ubmVyLXRvYXN0XSkgOndoZXJlKFtkYXRhLWljb25dKXtkaXNwbGF5OmZsZXg7aGVpZ2h0OjE2cHg7d2lkdGg6MTZweDtwb3NpdGlvbjpyZWxhdGl2ZTtqdXN0aWZ5LWNvbnRlbnQ6ZmxleC1zdGFydDthbGlnbi1pdGVtczpjZW50ZXI7ZmxleC1zaHJpbms6MDttYXJnaW4tbGVmdDp2YXIoLS10b2FzdC1pY29uLW1hcmdpbi1zdGFydCk7bWFyZ2luLXJpZ2h0OnZhcigtLXRvYXN0LWljb24tbWFyZ2luLWVuZCl9OndoZXJlKFtkYXRhLXNvbm5lci10b2FzdF1bZGF0YS1wcm9taXNlPVwidHJ1ZVwiXSkgOndoZXJlKFtkYXRhLWljb25dKT5zdmd7b3BhY2l0eTowO3RyYW5zZm9ybTpzY2FsZSguOCk7dHJhbnNmb3JtLW9yaWdpbjpjZW50ZXI7YW5pbWF0aW9uOnNvbm5lci1mYWRlLWluIC4zcyBlYXNlIGZvcndhcmRzfTp3aGVyZShbZGF0YS1zb25uZXItdG9hc3RdKSA6d2hlcmUoW2RhdGEtaWNvbl0pPip7ZmxleC1zaHJpbms6MH06d2hlcmUoW2RhdGEtc29ubmVyLXRvYXN0XSkgOndoZXJlKFtkYXRhLWljb25dKSBzdmd7bWFyZ2luLWxlZnQ6dmFyKC0tdG9hc3Qtc3ZnLW1hcmdpbi1zdGFydCk7bWFyZ2luLXJpZ2h0OnZhcigtLXRvYXN0LXN2Zy1tYXJnaW4tZW5kKX06d2hlcmUoW2RhdGEtc29ubmVyLXRvYXN0XSkgOndoZXJlKFtkYXRhLWNvbnRlbnRdKXtkaXNwbGF5OmZsZXg7ZmxleC1kaXJlY3Rpb246Y29sdW1uO2dhcDoycHh9W2RhdGEtc29ubmVyLXRvYXN0XVtkYXRhLXN0eWxlZD10cnVlXSBbZGF0YS1idXR0b25de2JvcmRlci1yYWRpdXM6NHB4O3BhZGRpbmctbGVmdDo4cHg7cGFkZGluZy1yaWdodDo4cHg7aGVpZ2h0OjI0cHg7Zm9udC1zaXplOjEycHg7Y29sb3I6dmFyKC0tbm9ybWFsLWJnKTtiYWNrZ3JvdW5kOnZhcigtLW5vcm1hbC10ZXh0KTttYXJnaW4tbGVmdDp2YXIoLS10b2FzdC1idXR0b24tbWFyZ2luLXN0YXJ0KTttYXJnaW4tcmlnaHQ6dmFyKC0tdG9hc3QtYnV0dG9uLW1hcmdpbi1lbmQpO2JvcmRlcjpub25lO2N1cnNvcjpwb2ludGVyO291dGxpbmU6bm9uZTtkaXNwbGF5OmZsZXg7YWxpZ24taXRlbXM6Y2VudGVyO2ZsZXgtc2hyaW5rOjA7dHJhbnNpdGlvbjpvcGFjaXR5IC40cyxib3gtc2hhZG93IC4yc306d2hlcmUoW2RhdGEtc29ubmVyLXRvYXN0XSkgOndoZXJlKFtkYXRhLWJ1dHRvbl0pOmZvY3VzLXZpc2libGV7Ym94LXNoYWRvdzowIDAgMCAycHggIzAwMDZ9OndoZXJlKFtkYXRhLXNvbm5lci10b2FzdF0pIDp3aGVyZShbZGF0YS1idXR0b25dKTpmaXJzdC1vZi10eXBle21hcmdpbi1sZWZ0OnZhcigtLXRvYXN0LWJ1dHRvbi1tYXJnaW4tc3RhcnQpO21hcmdpbi1yaWdodDp2YXIoLS10b2FzdC1idXR0b24tbWFyZ2luLWVuZCl9OndoZXJlKFtkYXRhLXNvbm5lci10b2FzdF0pIDp3aGVyZShbZGF0YS1jYW5jZWxdKXtjb2xvcjp2YXIoLS1ub3JtYWwtdGV4dCk7YmFja2dyb3VuZDpyZ2JhKDAsMCwwLC4wOCl9OndoZXJlKFtkYXRhLXNvbm5lci10b2FzdF1bZGF0YS10aGVtZT1cImRhcmtcIl0pIDp3aGVyZShbZGF0YS1jYW5jZWxdKXtiYWNrZ3JvdW5kOnJnYmEoMjU1LDI1NSwyNTUsLjMpfTp3aGVyZShbZGF0YS1zb25uZXItdG9hc3RdKSA6d2hlcmUoW2RhdGEtY2xvc2UtYnV0dG9uXSl7cG9zaXRpb246YWJzb2x1dGU7bGVmdDp2YXIoLS10b2FzdC1jbG9zZS1idXR0b24tc3RhcnQpO3JpZ2h0OnZhcigtLXRvYXN0LWNsb3NlLWJ1dHRvbi1lbmQpO3RvcDowO2hlaWdodDoyMHB4O3dpZHRoOjIwcHg7ZGlzcGxheTpmbGV4O2p1c3RpZnktY29udGVudDpjZW50ZXI7YWxpZ24taXRlbXM6Y2VudGVyO3BhZGRpbmc6MDtiYWNrZ3JvdW5kOnZhcigtLWdyYXkxKTtjb2xvcjp2YXIoLS1ncmF5MTIpO2JvcmRlcjoxcHggc29saWQgdmFyKC0tZ3JheTQpO3RyYW5zZm9ybTp2YXIoLS10b2FzdC1jbG9zZS1idXR0b24tdHJhbnNmb3JtKTtib3JkZXItcmFkaXVzOjUwJTtjdXJzb3I6cG9pbnRlcjt6LWluZGV4OjE7dHJhbnNpdGlvbjpvcGFjaXR5IC4xcyxiYWNrZ3JvdW5kIC4ycyxib3JkZXItY29sb3IgLjJzfTp3aGVyZShbZGF0YS1zb25uZXItdG9hc3RdKSA6d2hlcmUoW2RhdGEtY2xvc2UtYnV0dG9uXSk6Zm9jdXMtdmlzaWJsZXtib3gtc2hhZG93OjAgNHB4IDEycHggIzAwMDAwMDFhLDAgMCAwIDJweCAjMDAwM306d2hlcmUoW2RhdGEtc29ubmVyLXRvYXN0XSkgOndoZXJlKFtkYXRhLWRpc2FibGVkPVwidHJ1ZVwiXSl7Y3Vyc29yOm5vdC1hbGxvd2VkfTp3aGVyZShbZGF0YS1zb25uZXItdG9hc3RdKTpob3ZlciA6d2hlcmUoW2RhdGEtY2xvc2UtYnV0dG9uXSk6aG92ZXJ7YmFja2dyb3VuZDp2YXIoLS1ncmF5Mik7Ym9yZGVyLWNvbG9yOnZhcigtLWdyYXk1KX06d2hlcmUoW2RhdGEtc29ubmVyLXRvYXN0XVtkYXRhLXN3aXBpbmc9XCJ0cnVlXCJdKTpiZWZvcmV7Y29udGVudDpcIlwiO3Bvc2l0aW9uOmFic29sdXRlO2xlZnQ6MDtyaWdodDowO2hlaWdodDoxMDAlO3otaW5kZXg6LTF9OndoZXJlKFtkYXRhLXNvbm5lci10b2FzdF1bZGF0YS15LXBvc2l0aW9uPVwidG9wXCJdW2RhdGEtc3dpcGluZz1cInRydWVcIl0pOmJlZm9yZXtib3R0b206NTAlO3RyYW5zZm9ybTpzY2FsZVkoMykgdHJhbnNsYXRlWSg1MCUpfTp3aGVyZShbZGF0YS1zb25uZXItdG9hc3RdW2RhdGEteS1wb3NpdGlvbj1cImJvdHRvbVwiXVtkYXRhLXN3aXBpbmc9XCJ0cnVlXCJdKTpiZWZvcmV7dG9wOjUwJTt0cmFuc2Zvcm06c2NhbGVZKDMpIHRyYW5zbGF0ZVkoLTUwJSl9OndoZXJlKFtkYXRhLXNvbm5lci10b2FzdF1bZGF0YS1zd2lwaW5nPVwiZmFsc2VcIl1bZGF0YS1yZW1vdmVkPVwidHJ1ZVwiXSk6YmVmb3Jle2NvbnRlbnQ6XCJcIjtwb3NpdGlvbjphYnNvbHV0ZTtpbnNldDowO3RyYW5zZm9ybTpzY2FsZVkoMil9OndoZXJlKFtkYXRhLXNvbm5lci10b2FzdF0pOmFmdGVye2NvbnRlbnQ6XCJcIjtwb3NpdGlvbjphYnNvbHV0ZTtsZWZ0OjA7aGVpZ2h0OmNhbGModmFyKC0tZ2FwKSArIDFweCk7Ym90dG9tOjEwMCU7d2lkdGg6MTAwJX06d2hlcmUoW2RhdGEtc29ubmVyLXRvYXN0XVtkYXRhLW1vdW50ZWQ9XCJ0cnVlXCJdKXstLXk6IHRyYW5zbGF0ZVkoMCk7b3BhY2l0eToxfTp3aGVyZShbZGF0YS1zb25uZXItdG9hc3RdW2RhdGEtZXhwYW5kZWQ9XCJmYWxzZVwiXVtkYXRhLWZyb250PVwiZmFsc2VcIl0pey0tc2NhbGU6IHZhcigtLXRvYXN0cy1iZWZvcmUpICogLjA1ICsgMTstLXk6IHRyYW5zbGF0ZVkoY2FsYyh2YXIoLS1saWZ0LWFtb3VudCkgKiB2YXIoLS10b2FzdHMtYmVmb3JlKSkpIHNjYWxlKGNhbGMoLTEgKiB2YXIoLS1zY2FsZSkpKTtoZWlnaHQ6dmFyKC0tZnJvbnQtdG9hc3QtaGVpZ2h0KX06d2hlcmUoW2RhdGEtc29ubmVyLXRvYXN0XSk+Knt0cmFuc2l0aW9uOm9wYWNpdHkgLjRzfTp3aGVyZShbZGF0YS1zb25uZXItdG9hc3RdW2RhdGEtZXhwYW5kZWQ9XCJmYWxzZVwiXVtkYXRhLWZyb250PVwiZmFsc2VcIl1bZGF0YS1zdHlsZWQ9XCJ0cnVlXCJdKT4qe29wYWNpdHk6MH06d2hlcmUoW2RhdGEtc29ubmVyLXRvYXN0XVtkYXRhLXZpc2libGU9XCJmYWxzZVwiXSl7b3BhY2l0eTowO3BvaW50ZXItZXZlbnRzOm5vbmV9OndoZXJlKFtkYXRhLXNvbm5lci10b2FzdF1bZGF0YS1tb3VudGVkPVwidHJ1ZVwiXVtkYXRhLWV4cGFuZGVkPVwidHJ1ZVwiXSl7LS15OiB0cmFuc2xhdGVZKGNhbGModmFyKC0tbGlmdCkgKiB2YXIoLS1vZmZzZXQpKSk7aGVpZ2h0OnZhcigtLWluaXRpYWwtaGVpZ2h0KX06d2hlcmUoW2RhdGEtc29ubmVyLXRvYXN0XVtkYXRhLXJlbW92ZWQ9XCJ0cnVlXCJdW2RhdGEtZnJvbnQ9XCJ0cnVlXCJdW2RhdGEtc3dpcGUtb3V0PVwiZmFsc2VcIl0pey0teTogdHJhbnNsYXRlWShjYWxjKHZhcigtLWxpZnQpICogLTEwMCUpKTtvcGFjaXR5OjB9OndoZXJlKFtkYXRhLXNvbm5lci10b2FzdF1bZGF0YS1yZW1vdmVkPVwidHJ1ZVwiXVtkYXRhLWZyb250PVwiZmFsc2VcIl1bZGF0YS1zd2lwZS1vdXQ9XCJmYWxzZVwiXVtkYXRhLWV4cGFuZGVkPVwidHJ1ZVwiXSl7LS15OiB0cmFuc2xhdGVZKGNhbGModmFyKC0tbGlmdCkgKiB2YXIoLS1vZmZzZXQpICsgdmFyKC0tbGlmdCkgKiAtMTAwJSkpO29wYWNpdHk6MH06d2hlcmUoW2RhdGEtc29ubmVyLXRvYXN0XVtkYXRhLXJlbW92ZWQ9XCJ0cnVlXCJdW2RhdGEtZnJvbnQ9XCJmYWxzZVwiXVtkYXRhLXN3aXBlLW91dD1cImZhbHNlXCJdW2RhdGEtZXhwYW5kZWQ9XCJmYWxzZVwiXSl7LS15OiB0cmFuc2xhdGVZKDQwJSk7b3BhY2l0eTowO3RyYW5zaXRpb246dHJhbnNmb3JtIC41cyxvcGFjaXR5IC4yc306d2hlcmUoW2RhdGEtc29ubmVyLXRvYXN0XVtkYXRhLXJlbW92ZWQ9XCJ0cnVlXCJdW2RhdGEtZnJvbnQ9XCJmYWxzZVwiXSk6YmVmb3Jle2hlaWdodDpjYWxjKHZhcigtLWluaXRpYWwtaGVpZ2h0KSArIDIwJSl9W2RhdGEtc29ubmVyLXRvYXN0XVtkYXRhLXN3aXBpbmc9dHJ1ZV17dHJhbnNmb3JtOnZhcigtLXkpIHRyYW5zbGF0ZVkodmFyKC0tc3dpcGUtYW1vdW50LCAwcHgpKTt0cmFuc2l0aW9uOm5vbmV9W2RhdGEtc29ubmVyLXRvYXN0XVtkYXRhLXN3aXBlLW91dD10cnVlXVtkYXRhLXktcG9zaXRpb249Ym90dG9tXSxbZGF0YS1zb25uZXItdG9hc3RdW2RhdGEtc3dpcGUtb3V0PXRydWVdW2RhdGEteS1wb3NpdGlvbj10b3Bde2FuaW1hdGlvbjpzd2lwZS1vdXQgLjJzIGVhc2Utb3V0IGZvcndhcmRzfUBrZXlmcmFtZXMgc3dpcGUtb3V0ezAle3RyYW5zZm9ybTp0cmFuc2xhdGVZKGNhbGModmFyKC0tbGlmdCkgKiB2YXIoLS1vZmZzZXQpICsgdmFyKC0tc3dpcGUtYW1vdW50KSkpO29wYWNpdHk6MX10b3t0cmFuc2Zvcm06dHJhbnNsYXRlWShjYWxjKHZhcigtLWxpZnQpICogdmFyKC0tb2Zmc2V0KSArIHZhcigtLXN3aXBlLWFtb3VudCkgKyB2YXIoLS1saWZ0KSAqIC0xMDAlKSk7b3BhY2l0eTowfX1AbWVkaWEgKG1heC13aWR0aDogNjAwcHgpe1tkYXRhLXNvbm5lci10b2FzdGVyXXtwb3NpdGlvbjpmaXhlZDstLW1vYmlsZS1vZmZzZXQ6IDE2cHg7cmlnaHQ6dmFyKC0tbW9iaWxlLW9mZnNldCk7bGVmdDp2YXIoLS1tb2JpbGUtb2Zmc2V0KTt3aWR0aDoxMDAlfVtkYXRhLXNvbm5lci10b2FzdGVyXSBbZGF0YS1zb25uZXItdG9hc3Rde2xlZnQ6MDtyaWdodDowO3dpZHRoOmNhbGMoMTAwJSAtIHZhcigtLW1vYmlsZS1vZmZzZXQpICogMil9W2RhdGEtc29ubmVyLXRvYXN0ZXJdW2RhdGEteC1wb3NpdGlvbj1sZWZ0XXtsZWZ0OnZhcigtLW1vYmlsZS1vZmZzZXQpfVtkYXRhLXNvbm5lci10b2FzdGVyXVtkYXRhLXktcG9zaXRpb249Ym90dG9tXXtib3R0b206MjBweH1bZGF0YS1zb25uZXItdG9hc3Rlcl1bZGF0YS15LXBvc2l0aW9uPXRvcF17dG9wOjIwcHh9W2RhdGEtc29ubmVyLXRvYXN0ZXJdW2RhdGEteC1wb3NpdGlvbj1jZW50ZXJde2xlZnQ6dmFyKC0tbW9iaWxlLW9mZnNldCk7cmlnaHQ6dmFyKC0tbW9iaWxlLW9mZnNldCk7dHJhbnNmb3JtOm5vbmV9fVtkYXRhLXNvbm5lci10b2FzdGVyXVtkYXRhLXRoZW1lPWxpZ2h0XXstLW5vcm1hbC1iZzogI2ZmZjstLW5vcm1hbC1ib3JkZXI6IHZhcigtLWdyYXk0KTstLW5vcm1hbC10ZXh0OiB2YXIoLS1ncmF5MTIpOy0tc3VjY2Vzcy1iZzogaHNsKDE0MywgODUlLCA5NiUpOy0tc3VjY2Vzcy1ib3JkZXI6IGhzbCgxNDUsIDkyJSwgOTElKTstLXN1Y2Nlc3MtdGV4dDogaHNsKDE0MCwgMTAwJSwgMjclKTstLWluZm8tYmc6IGhzbCgyMDgsIDEwMCUsIDk3JSk7LS1pbmZvLWJvcmRlcjogaHNsKDIyMSwgOTElLCA5MSUpOy0taW5mby10ZXh0OiBoc2woMjEwLCA5MiUsIDQ1JSk7LS13YXJuaW5nLWJnOiBoc2woNDksIDEwMCUsIDk3JSk7LS13YXJuaW5nLWJvcmRlcjogaHNsKDQ5LCA5MSUsIDkxJSk7LS13YXJuaW5nLXRleHQ6IGhzbCgzMSwgOTIlLCA0NSUpOy0tZXJyb3ItYmc6IGhzbCgzNTksIDEwMCUsIDk3JSk7LS1lcnJvci1ib3JkZXI6IGhzbCgzNTksIDEwMCUsIDk0JSk7LS1lcnJvci10ZXh0OiBoc2woMzYwLCAxMDAlLCA0NSUpfVtkYXRhLXNvbm5lci10b2FzdGVyXVtkYXRhLXRoZW1lPWxpZ2h0XSBbZGF0YS1zb25uZXItdG9hc3RdW2RhdGEtaW52ZXJ0PXRydWVdey0tbm9ybWFsLWJnOiAjMDAwOy0tbm9ybWFsLWJvcmRlcjogaHNsKDAsIDAlLCAyMCUpOy0tbm9ybWFsLXRleHQ6IHZhcigtLWdyYXkxKX1bZGF0YS1zb25uZXItdG9hc3Rlcl1bZGF0YS10aGVtZT1kYXJrXSBbZGF0YS1zb25uZXItdG9hc3RdW2RhdGEtaW52ZXJ0PXRydWVdey0tbm9ybWFsLWJnOiAjZmZmOy0tbm9ybWFsLWJvcmRlcjogdmFyKC0tZ3JheTMpOy0tbm9ybWFsLXRleHQ6IHZhcigtLWdyYXkxMil9W2RhdGEtc29ubmVyLXRvYXN0ZXJdW2RhdGEtdGhlbWU9ZGFya117LS1ub3JtYWwtYmc6ICMwMDA7LS1ub3JtYWwtYm9yZGVyOiBoc2woMCwgMCUsIDIwJSk7LS1ub3JtYWwtdGV4dDogdmFyKC0tZ3JheTEpOy0tc3VjY2Vzcy1iZzogaHNsKDE1MCwgMTAwJSwgNiUpOy0tc3VjY2Vzcy1ib3JkZXI6IGhzbCgxNDcsIDEwMCUsIDEyJSk7LS1zdWNjZXNzLXRleHQ6IGhzbCgxNTAsIDg2JSwgNjUlKTstLWluZm8tYmc6IGhzbCgyMTUsIDEwMCUsIDYlKTstLWluZm8tYm9yZGVyOiBoc2woMjIzLCAxMDAlLCAxMiUpOy0taW5mby10ZXh0OiBoc2woMjE2LCA4NyUsIDY1JSk7LS13YXJuaW5nLWJnOiBoc2woNjQsIDEwMCUsIDYlKTstLXdhcm5pbmctYm9yZGVyOiBoc2woNjAsIDEwMCUsIDEyJSk7LS13YXJuaW5nLXRleHQ6IGhzbCg0NiwgODclLCA2NSUpOy0tZXJyb3ItYmc6IGhzbCgzNTgsIDc2JSwgMTAlKTstLWVycm9yLWJvcmRlcjogaHNsKDM1NywgODklLCAxNiUpOy0tZXJyb3ItdGV4dDogaHNsKDM1OCwgMTAwJSwgODElKX1bZGF0YS1yaWNoLWNvbG9ycz10cnVlXVtkYXRhLXNvbm5lci10b2FzdF1bZGF0YS10eXBlPXN1Y2Nlc3NdLFtkYXRhLXJpY2gtY29sb3JzPXRydWVdW2RhdGEtc29ubmVyLXRvYXN0XVtkYXRhLXR5cGU9c3VjY2Vzc10gW2RhdGEtY2xvc2UtYnV0dG9uXXtiYWNrZ3JvdW5kOnZhcigtLXN1Y2Nlc3MtYmcpO2JvcmRlci1jb2xvcjp2YXIoLS1zdWNjZXNzLWJvcmRlcik7Y29sb3I6dmFyKC0tc3VjY2Vzcy10ZXh0KX1bZGF0YS1yaWNoLWNvbG9ycz10cnVlXVtkYXRhLXNvbm5lci10b2FzdF1bZGF0YS10eXBlPWluZm9dLFtkYXRhLXJpY2gtY29sb3JzPXRydWVdW2RhdGEtc29ubmVyLXRvYXN0XVtkYXRhLXR5cGU9aW5mb10gW2RhdGEtY2xvc2UtYnV0dG9uXXtiYWNrZ3JvdW5kOnZhcigtLWluZm8tYmcpO2JvcmRlci1jb2xvcjp2YXIoLS1pbmZvLWJvcmRlcik7Y29sb3I6dmFyKC0taW5mby10ZXh0KX1bZGF0YS1yaWNoLWNvbG9ycz10cnVlXVtkYXRhLXNvbm5lci10b2FzdF1bZGF0YS10eXBlPXdhcm5pbmddLFtkYXRhLXJpY2gtY29sb3JzPXRydWVdW2RhdGEtc29ubmVyLXRvYXN0XVtkYXRhLXR5cGU9d2FybmluZ10gW2RhdGEtY2xvc2UtYnV0dG9uXXtiYWNrZ3JvdW5kOnZhcigtLXdhcm5pbmctYmcpO2JvcmRlci1jb2xvcjp2YXIoLS13YXJuaW5nLWJvcmRlcik7Y29sb3I6dmFyKC0td2FybmluZy10ZXh0KX1bZGF0YS1yaWNoLWNvbG9ycz10cnVlXVtkYXRhLXNvbm5lci10b2FzdF1bZGF0YS10eXBlPWVycm9yXSxbZGF0YS1yaWNoLWNvbG9ycz10cnVlXVtkYXRhLXNvbm5lci10b2FzdF1bZGF0YS10eXBlPWVycm9yXSBbZGF0YS1jbG9zZS1idXR0b25de2JhY2tncm91bmQ6dmFyKC0tZXJyb3ItYmcpO2JvcmRlci1jb2xvcjp2YXIoLS1lcnJvci1ib3JkZXIpO2NvbG9yOnZhcigtLWVycm9yLXRleHQpfS5zb25uZXItbG9hZGluZy13cmFwcGVyey0tc2l6ZTogMTZweDtoZWlnaHQ6dmFyKC0tc2l6ZSk7d2lkdGg6dmFyKC0tc2l6ZSk7cG9zaXRpb246YWJzb2x1dGU7aW5zZXQ6MDt6LWluZGV4OjEwfS5zb25uZXItbG9hZGluZy13cmFwcGVyW2RhdGEtdmlzaWJsZT1mYWxzZV17dHJhbnNmb3JtLW9yaWdpbjpjZW50ZXI7YW5pbWF0aW9uOnNvbm5lci1mYWRlLW91dCAuMnMgZWFzZSBmb3J3YXJkc30uc29ubmVyLXNwaW5uZXJ7cG9zaXRpb246cmVsYXRpdmU7dG9wOjUwJTtsZWZ0OjUwJTtoZWlnaHQ6dmFyKC0tc2l6ZSk7d2lkdGg6dmFyKC0tc2l6ZSl9LnNvbm5lci1sb2FkaW5nLWJhcnthbmltYXRpb246c29ubmVyLXNwaW4gMS4ycyBsaW5lYXIgaW5maW5pdGU7YmFja2dyb3VuZDp2YXIoLS1ncmF5MTEpO2JvcmRlci1yYWRpdXM6NnB4O2hlaWdodDo4JTtsZWZ0Oi0xMCU7cG9zaXRpb246YWJzb2x1dGU7dG9wOi0zLjklO3dpZHRoOjI0JX0uc29ubmVyLWxvYWRpbmctYmFyOm50aC1jaGlsZCgxKXthbmltYXRpb24tZGVsYXk6LTEuMnM7dHJhbnNmb3JtOnJvdGF0ZSguMDAwMWRlZykgdHJhbnNsYXRlKDE0NiUpfS5zb25uZXItbG9hZGluZy1iYXI6bnRoLWNoaWxkKDIpe2FuaW1hdGlvbi1kZWxheTotMS4xczt0cmFuc2Zvcm06cm90YXRlKDMwZGVnKSB0cmFuc2xhdGUoMTQ2JSl9LnNvbm5lci1sb2FkaW5nLWJhcjpudGgtY2hpbGQoMyl7YW5pbWF0aW9uLWRlbGF5Oi0xczt0cmFuc2Zvcm06cm90YXRlKDYwZGVnKSB0cmFuc2xhdGUoMTQ2JSl9LnNvbm5lci1sb2FkaW5nLWJhcjpudGgtY2hpbGQoNCl7YW5pbWF0aW9uLWRlbGF5Oi0uOXM7dHJhbnNmb3JtOnJvdGF0ZSg5MGRlZykgdHJhbnNsYXRlKDE0NiUpfS5zb25uZXItbG9hZGluZy1iYXI6bnRoLWNoaWxkKDUpe2FuaW1hdGlvbi1kZWxheTotLjhzO3RyYW5zZm9ybTpyb3RhdGUoMTIwZGVnKSB0cmFuc2xhdGUoMTQ2JSl9LnNvbm5lci1sb2FkaW5nLWJhcjpudGgtY2hpbGQoNil7YW5pbWF0aW9uLWRlbGF5Oi0uN3M7dHJhbnNmb3JtOnJvdGF0ZSgxNTBkZWcpIHRyYW5zbGF0ZSgxNDYlKX0uc29ubmVyLWxvYWRpbmctYmFyOm50aC1jaGlsZCg3KXthbmltYXRpb24tZGVsYXk6LS42czt0cmFuc2Zvcm06cm90YXRlKDE4MGRlZykgdHJhbnNsYXRlKDE0NiUpfS5zb25uZXItbG9hZGluZy1iYXI6bnRoLWNoaWxkKDgpe2FuaW1hdGlvbi1kZWxheTotLjVzO3RyYW5zZm9ybTpyb3RhdGUoMjEwZGVnKSB0cmFuc2xhdGUoMTQ2JSl9LnNvbm5lci1sb2FkaW5nLWJhcjpudGgtY2hpbGQoOSl7YW5pbWF0aW9uLWRlbGF5Oi0uNHM7dHJhbnNmb3JtOnJvdGF0ZSgyNDBkZWcpIHRyYW5zbGF0ZSgxNDYlKX0uc29ubmVyLWxvYWRpbmctYmFyOm50aC1jaGlsZCgxMCl7YW5pbWF0aW9uLWRlbGF5Oi0uM3M7dHJhbnNmb3JtOnJvdGF0ZSgyNzBkZWcpIHRyYW5zbGF0ZSgxNDYlKX0uc29ubmVyLWxvYWRpbmctYmFyOm50aC1jaGlsZCgxMSl7YW5pbWF0aW9uLWRlbGF5Oi0uMnM7dHJhbnNmb3JtOnJvdGF0ZSgzMDBkZWcpIHRyYW5zbGF0ZSgxNDYlKX0uc29ubmVyLWxvYWRpbmctYmFyOm50aC1jaGlsZCgxMil7YW5pbWF0aW9uLWRlbGF5Oi0uMXM7dHJhbnNmb3JtOnJvdGF0ZSgzMzBkZWcpIHRyYW5zbGF0ZSgxNDYlKX1Aa2V5ZnJhbWVzIHNvbm5lci1mYWRlLWluezAle29wYWNpdHk6MDt0cmFuc2Zvcm06c2NhbGUoLjgpfXRve29wYWNpdHk6MTt0cmFuc2Zvcm06c2NhbGUoMSl9fUBrZXlmcmFtZXMgc29ubmVyLWZhZGUtb3V0ezAle29wYWNpdHk6MTt0cmFuc2Zvcm06c2NhbGUoMSl9dG97b3BhY2l0eTowO3RyYW5zZm9ybTpzY2FsZSguOCl9fUBrZXlmcmFtZXMgc29ubmVyLXNwaW57MCV7b3BhY2l0eToxfXRve29wYWNpdHk6LjE1fX1AbWVkaWEgKHByZWZlcnMtcmVkdWNlZC1tb3Rpb24pe1tkYXRhLXNvbm5lci10b2FzdF0sW2RhdGEtc29ubmVyLXRvYXN0XT4qLC5zb25uZXItbG9hZGluZy1iYXJ7dHJhbnNpdGlvbjpub25lIWltcG9ydGFudDthbmltYXRpb246bm9uZSFpbXBvcnRhbnR9fS5zb25uZXItbG9hZGVye3Bvc2l0aW9uOmFic29sdXRlO3RvcDo1MCU7bGVmdDo1MCU7dHJhbnNmb3JtOnRyYW5zbGF0ZSgtNTAlLC01MCUpO3RyYW5zZm9ybS1vcmlnaW46Y2VudGVyO3RyYW5zaXRpb246b3BhY2l0eSAuMnMsdHJhbnNmb3JtIC4yc30uc29ubmVyLWxvYWRlcltkYXRhLXZpc2libGU9ZmFsc2Vde29wYWNpdHk6MDt0cmFuc2Zvcm06c2NhbGUoLjgpIHRyYW5zbGF0ZSgtNTAlLC01MCUpfVxuYCk7ZnVuY3Rpb24gVShzKXtyZXR1cm4gcy5sYWJlbCE9PXZvaWQgMH12YXIgcXQ9MyxRdD1cIjMycHhcIixadD00ZTMsdGU9MzU2LGVlPTE0LG9lPTIwLGFlPTIwMDtmdW5jdGlvbiBuZSguLi5zKXtyZXR1cm4gcy5maWx0ZXIoQm9vbGVhbikuam9pbihcIiBcIil9dmFyIHNlPXM9Pnt2YXIgeXQseHQsdnQsd3QsVHQsU3QsUnQsRXQsTnQsUHQ7bGV0e2ludmVydDpvLHRvYXN0OnQsdW5zdHlsZWQ6bixpbnRlcmFjdGluZzpoLHNldEhlaWdodHM6dSx2aXNpYmxlVG9hc3RzOmcsaGVpZ2h0czpiLGluZGV4OmQsdG9hc3RzOnEsZXhwYW5kZWQ6JCxyZW1vdmVUb2FzdDpWLGRlZmF1bHRSaWNoQ29sb3JzOlEsY2xvc2VCdXR0b246aSxzdHlsZTpPLGNhbmNlbEJ1dHRvblN0eWxlOkssYWN0aW9uQnV0dG9uU3R5bGU6WixjbGFzc05hbWU6dHQ9XCJcIixkZXNjcmlwdGlvbkNsYXNzTmFtZTpldD1cIlwiLGR1cmF0aW9uOlgscG9zaXRpb246b3QsZ2FwOncsbG9hZGluZ0ljb246aixleHBhbmRCeURlZmF1bHQ6VyxjbGFzc05hbWVzOnIsaWNvbnM6SSxjbG9zZUJ1dHRvbkFyaWFMYWJlbDphdD1cIkNsb3NlIHRvYXN0XCIscGF1c2VXaGVuUGFnZUlzSGlkZGVuOmssY246VH09cyxbeixudF09ZS51c2VTdGF0ZSghMSksW0QsSF09ZS51c2VTdGF0ZSghMSksW3N0LE5dPWUudXNlU3RhdGUoITEpLFtNLHJ0XT1lLnVzZVN0YXRlKCExKSxbYyxtXT1lLnVzZVN0YXRlKDApLFt5LFNdPWUudXNlU3RhdGUoMCksQT1lLnVzZVJlZihudWxsKSxsPWUudXNlUmVmKG51bGwpLF89ZD09PTAsSj1kKzE8PWcseD10LnR5cGUsUD10LmRpc21pc3NpYmxlIT09ITEsTXQ9dC5jbGFzc05hbWV8fFwiXCIsQXQ9dC5kZXNjcmlwdGlvbkNsYXNzTmFtZXx8XCJcIixHPWUudXNlTWVtbygoKT0+Yi5maW5kSW5kZXgoYT0+YS50b2FzdElkPT09dC5pZCl8fDAsW2IsdC5pZF0pLEx0PWUudXNlTWVtbygoKT0+e3ZhciBhO3JldHVybihhPXQuY2xvc2VCdXR0b24pIT1udWxsP2E6aX0sW3QuY2xvc2VCdXR0b24saV0pLG10PWUudXNlTWVtbygoKT0+dC5kdXJhdGlvbnx8WHx8WnQsW3QuZHVyYXRpb24sWF0pLGl0PWUudXNlUmVmKDApLFk9ZS51c2VSZWYoMCkscHQ9ZS51c2VSZWYoMCksRj1lLnVzZVJlZihudWxsKSxbZ3QsenRdPW90LnNwbGl0KFwiLVwiKSxodD1lLnVzZU1lbW8oKCk9PmIucmVkdWNlKChhLGYscCk9PnA+PUc/YTphK2YuaGVpZ2h0LDApLFtiLEddKSxidD1EdCgpLGp0PXQuaW52ZXJ0fHxvLGx0PXg9PT1cImxvYWRpbmdcIjtZLmN1cnJlbnQ9ZS51c2VNZW1vKCgpPT5HKncraHQsW0csaHRdKSxlLnVzZUVmZmVjdCgoKT0+e250KCEwKX0sW10pLGUudXNlTGF5b3V0RWZmZWN0KCgpPT57aWYoIXopcmV0dXJuO2xldCBhPWwuY3VycmVudCxmPWEuc3R5bGUuaGVpZ2h0O2Euc3R5bGUuaGVpZ2h0PVwiYXV0b1wiO2xldCBwPWEuZ2V0Qm91bmRpbmdDbGllbnRSZWN0KCkuaGVpZ2h0O2Euc3R5bGUuaGVpZ2h0PWYsUyhwKSx1KEI9PkIuZmluZChSPT5SLnRvYXN0SWQ9PT10LmlkKT9CLm1hcChSPT5SLnRvYXN0SWQ9PT10LmlkP3suLi5SLGhlaWdodDpwfTpSKTpbe3RvYXN0SWQ6dC5pZCxoZWlnaHQ6cCxwb3NpdGlvbjp0LnBvc2l0aW9ufSwuLi5CXSl9LFt6LHQudGl0bGUsdC5kZXNjcmlwdGlvbix1LHQuaWRdKTtsZXQgTD1lLnVzZUNhbGxiYWNrKCgpPT57SCghMCksbShZLmN1cnJlbnQpLHUoYT0+YS5maWx0ZXIoZj0+Zi50b2FzdElkIT09dC5pZCkpLHNldFRpbWVvdXQoKCk9PntWKHQpfSxhZSl9LFt0LFYsdSxZXSk7ZS51c2VFZmZlY3QoKCk9PntpZih0LnByb21pc2UmJng9PT1cImxvYWRpbmdcInx8dC5kdXJhdGlvbj09PTEvMHx8dC50eXBlPT09XCJsb2FkaW5nXCIpcmV0dXJuO2xldCBhLGY9bXQ7cmV0dXJuICR8fGh8fGsmJmJ0PygoKT0+e2lmKHB0LmN1cnJlbnQ8aXQuY3VycmVudCl7bGV0IEM9bmV3IERhdGUoKS5nZXRUaW1lKCktaXQuY3VycmVudDtmPWYtQ31wdC5jdXJyZW50PW5ldyBEYXRlKCkuZ2V0VGltZSgpfSkoKTooKCk9PntmIT09MS8wJiYoaXQuY3VycmVudD1uZXcgRGF0ZSgpLmdldFRpbWUoKSxhPXNldFRpbWVvdXQoKCk9Pnt2YXIgQzsoQz10Lm9uQXV0b0Nsb3NlKT09bnVsbHx8Qy5jYWxsKHQsdCksTCgpfSxmKSl9KSgpLCgpPT5jbGVhclRpbWVvdXQoYSl9LFskLGgsVyx0LG10LEwsdC5wcm9taXNlLHgsayxidF0pLGUudXNlRWZmZWN0KCgpPT57bGV0IGE9bC5jdXJyZW50O2lmKGEpe2xldCBmPWEuZ2V0Qm91bmRpbmdDbGllbnRSZWN0KCkuaGVpZ2h0O3JldHVybiBTKGYpLHUocD0+W3t0b2FzdElkOnQuaWQsaGVpZ2h0OmYscG9zaXRpb246dC5wb3NpdGlvbn0sLi4ucF0pLCgpPT51KHA9PnAuZmlsdGVyKEI9PkIudG9hc3RJZCE9PXQuaWQpKX19LFt1LHQuaWRdKSxlLnVzZUVmZmVjdCgoKT0+e3QuZGVsZXRlJiZMKCl9LFtMLHQuZGVsZXRlXSk7ZnVuY3Rpb24gWXQoKXtyZXR1cm4gSSE9bnVsbCYmSS5sb2FkaW5nP2UuY3JlYXRlRWxlbWVudChcImRpdlwiLHtjbGFzc05hbWU6XCJzb25uZXItbG9hZGVyXCIsXCJkYXRhLXZpc2libGVcIjp4PT09XCJsb2FkaW5nXCJ9LEkubG9hZGluZyk6aj9lLmNyZWF0ZUVsZW1lbnQoXCJkaXZcIix7Y2xhc3NOYW1lOlwic29ubmVyLWxvYWRlclwiLFwiZGF0YS12aXNpYmxlXCI6eD09PVwibG9hZGluZ1wifSxqKTplLmNyZWF0ZUVsZW1lbnQoSXQse3Zpc2libGU6eD09PVwibG9hZGluZ1wifSl9cmV0dXJuIGUuY3JlYXRlRWxlbWVudChcImxpXCIse1wiYXJpYS1saXZlXCI6dC5pbXBvcnRhbnQ/XCJhc3NlcnRpdmVcIjpcInBvbGl0ZVwiLFwiYXJpYS1hdG9taWNcIjpcInRydWVcIixyb2xlOlwic3RhdHVzXCIsdGFiSW5kZXg6MCxyZWY6bCxjbGFzc05hbWU6VCh0dCxNdCxyPT1udWxsP3ZvaWQgMDpyLnRvYXN0LCh5dD10PT1udWxsP3ZvaWQgMDp0LmNsYXNzTmFtZXMpPT1udWxsP3ZvaWQgMDp5dC50b2FzdCxyPT1udWxsP3ZvaWQgMDpyLmRlZmF1bHQscj09bnVsbD92b2lkIDA6clt4XSwoeHQ9dD09bnVsbD92b2lkIDA6dC5jbGFzc05hbWVzKT09bnVsbD92b2lkIDA6eHRbeF0pLFwiZGF0YS1zb25uZXItdG9hc3RcIjpcIlwiLFwiZGF0YS1yaWNoLWNvbG9yc1wiOih2dD10LnJpY2hDb2xvcnMpIT1udWxsP3Z0OlEsXCJkYXRhLXN0eWxlZFwiOiEodC5qc3h8fHQudW5zdHlsZWR8fG4pLFwiZGF0YS1tb3VudGVkXCI6eixcImRhdGEtcHJvbWlzZVwiOiEhdC5wcm9taXNlLFwiZGF0YS1yZW1vdmVkXCI6RCxcImRhdGEtdmlzaWJsZVwiOkosXCJkYXRhLXktcG9zaXRpb25cIjpndCxcImRhdGEteC1wb3NpdGlvblwiOnp0LFwiZGF0YS1pbmRleFwiOmQsXCJkYXRhLWZyb250XCI6XyxcImRhdGEtc3dpcGluZ1wiOnN0LFwiZGF0YS1kaXNtaXNzaWJsZVwiOlAsXCJkYXRhLXR5cGVcIjp4LFwiZGF0YS1pbnZlcnRcIjpqdCxcImRhdGEtc3dpcGUtb3V0XCI6TSxcImRhdGEtZXhwYW5kZWRcIjohISgkfHxXJiZ6KSxzdHlsZTp7XCItLWluZGV4XCI6ZCxcIi0tdG9hc3RzLWJlZm9yZVwiOmQsXCItLXotaW5kZXhcIjpxLmxlbmd0aC1kLFwiLS1vZmZzZXRcIjpgJHtEP2M6WS5jdXJyZW50fXB4YCxcIi0taW5pdGlhbC1oZWlnaHRcIjpXP1wiYXV0b1wiOmAke3l9cHhgLC4uLk8sLi4udC5zdHlsZX0sb25Qb2ludGVyRG93bjphPT57bHR8fCFQfHwoQS5jdXJyZW50PW5ldyBEYXRlLG0oWS5jdXJyZW50KSxhLnRhcmdldC5zZXRQb2ludGVyQ2FwdHVyZShhLnBvaW50ZXJJZCksYS50YXJnZXQudGFnTmFtZSE9PVwiQlVUVE9OXCImJihOKCEwKSxGLmN1cnJlbnQ9e3g6YS5jbGllbnRYLHk6YS5jbGllbnRZfSkpfSxvblBvaW50ZXJVcDooKT0+e3ZhciBCLEMsUixkdDtpZihNfHwhUClyZXR1cm47Ri5jdXJyZW50PW51bGw7bGV0IGE9TnVtYmVyKCgoQj1sLmN1cnJlbnQpPT1udWxsP3ZvaWQgMDpCLnN0eWxlLmdldFByb3BlcnR5VmFsdWUoXCItLXN3aXBlLWFtb3VudFwiKS5yZXBsYWNlKFwicHhcIixcIlwiKSl8fDApLGY9bmV3IERhdGUoKS5nZXRUaW1lKCktKChDPUEuY3VycmVudCk9PW51bGw/dm9pZCAwOkMuZ2V0VGltZSgpKSxwPU1hdGguYWJzKGEpL2Y7aWYoTWF0aC5hYnMoYSk+PW9lfHxwPi4xMSl7bShZLmN1cnJlbnQpLChSPXQub25EaXNtaXNzKT09bnVsbHx8Ui5jYWxsKHQsdCksTCgpLHJ0KCEwKTtyZXR1cm59KGR0PWwuY3VycmVudCk9PW51bGx8fGR0LnN0eWxlLnNldFByb3BlcnR5KFwiLS1zd2lwZS1hbW91bnRcIixcIjBweFwiKSxOKCExKX0sb25Qb2ludGVyTW92ZTphPT57dmFyIEJ0O2lmKCFGLmN1cnJlbnR8fCFQKXJldHVybjtsZXQgZj1hLmNsaWVudFktRi5jdXJyZW50LnkscD1hLmNsaWVudFgtRi5jdXJyZW50LngsQz0oZ3Q9PT1cInRvcFwiP01hdGgubWluOk1hdGgubWF4KSgwLGYpLFI9YS5wb2ludGVyVHlwZT09PVwidG91Y2hcIj8xMDoyO01hdGguYWJzKEMpPlI/KEJ0PWwuY3VycmVudCk9PW51bGx8fEJ0LnN0eWxlLnNldFByb3BlcnR5KFwiLS1zd2lwZS1hbW91bnRcIixgJHtmfXB4YCk6TWF0aC5hYnMocCk+UiYmKEYuY3VycmVudD1udWxsKX19LEx0JiYhdC5qc3g/ZS5jcmVhdGVFbGVtZW50KFwiYnV0dG9uXCIse1wiYXJpYS1sYWJlbFwiOmF0LFwiZGF0YS1kaXNhYmxlZFwiOmx0LFwiZGF0YS1jbG9zZS1idXR0b25cIjohMCxvbkNsaWNrOmx0fHwhUD8oKT0+e306KCk9Pnt2YXIgYTtMKCksKGE9dC5vbkRpc21pc3MpPT1udWxsfHxhLmNhbGwodCx0KX0sY2xhc3NOYW1lOlQocj09bnVsbD92b2lkIDA6ci5jbG9zZUJ1dHRvbiwod3Q9dD09bnVsbD92b2lkIDA6dC5jbGFzc05hbWVzKT09bnVsbD92b2lkIDA6d3QuY2xvc2VCdXR0b24pfSxlLmNyZWF0ZUVsZW1lbnQoXCJzdmdcIix7eG1sbnM6XCJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2Z1wiLHdpZHRoOlwiMTJcIixoZWlnaHQ6XCIxMlwiLHZpZXdCb3g6XCIwIDAgMjQgMjRcIixmaWxsOlwibm9uZVwiLHN0cm9rZTpcImN1cnJlbnRDb2xvclwiLHN0cm9rZVdpZHRoOlwiMS41XCIsc3Ryb2tlTGluZWNhcDpcInJvdW5kXCIsc3Ryb2tlTGluZWpvaW46XCJyb3VuZFwifSxlLmNyZWF0ZUVsZW1lbnQoXCJsaW5lXCIse3gxOlwiMThcIix5MTpcIjZcIix4MjpcIjZcIix5MjpcIjE4XCJ9KSxlLmNyZWF0ZUVsZW1lbnQoXCJsaW5lXCIse3gxOlwiNlwiLHkxOlwiNlwiLHgyOlwiMThcIix5MjpcIjE4XCJ9KSkpOm51bGwsdC5qc3h8fGUuaXNWYWxpZEVsZW1lbnQodC50aXRsZSk/dC5qc3h8fHQudGl0bGU6ZS5jcmVhdGVFbGVtZW50KGUuRnJhZ21lbnQsbnVsbCx4fHx0Lmljb258fHQucHJvbWlzZT9lLmNyZWF0ZUVsZW1lbnQoXCJkaXZcIix7XCJkYXRhLWljb25cIjpcIlwiLGNsYXNzTmFtZTpUKHI9PW51bGw/dm9pZCAwOnIuaWNvbiwoVHQ9dD09bnVsbD92b2lkIDA6dC5jbGFzc05hbWVzKT09bnVsbD92b2lkIDA6VHQuaWNvbil9LHQucHJvbWlzZXx8dC50eXBlPT09XCJsb2FkaW5nXCImJiF0Lmljb24/dC5pY29ufHxZdCgpOm51bGwsdC50eXBlIT09XCJsb2FkaW5nXCI/dC5pY29ufHwoST09bnVsbD92b2lkIDA6SVt4XSl8fEN0KHgpOm51bGwpOm51bGwsZS5jcmVhdGVFbGVtZW50KFwiZGl2XCIse1wiZGF0YS1jb250ZW50XCI6XCJcIixjbGFzc05hbWU6VChyPT1udWxsP3ZvaWQgMDpyLmNvbnRlbnQsKFN0PXQ9PW51bGw/dm9pZCAwOnQuY2xhc3NOYW1lcyk9PW51bGw/dm9pZCAwOlN0LmNvbnRlbnQpfSxlLmNyZWF0ZUVsZW1lbnQoXCJkaXZcIix7XCJkYXRhLXRpdGxlXCI6XCJcIixjbGFzc05hbWU6VChyPT1udWxsP3ZvaWQgMDpyLnRpdGxlLChSdD10PT1udWxsP3ZvaWQgMDp0LmNsYXNzTmFtZXMpPT1udWxsP3ZvaWQgMDpSdC50aXRsZSl9LHQudGl0bGUpLHQuZGVzY3JpcHRpb24/ZS5jcmVhdGVFbGVtZW50KFwiZGl2XCIse1wiZGF0YS1kZXNjcmlwdGlvblwiOlwiXCIsY2xhc3NOYW1lOlQoZXQsQXQscj09bnVsbD92b2lkIDA6ci5kZXNjcmlwdGlvbiwoRXQ9dD09bnVsbD92b2lkIDA6dC5jbGFzc05hbWVzKT09bnVsbD92b2lkIDA6RXQuZGVzY3JpcHRpb24pfSx0LmRlc2NyaXB0aW9uKTpudWxsKSxlLmlzVmFsaWRFbGVtZW50KHQuY2FuY2VsKT90LmNhbmNlbDp0LmNhbmNlbCYmVSh0LmNhbmNlbCk/ZS5jcmVhdGVFbGVtZW50KFwiYnV0dG9uXCIse1wiZGF0YS1idXR0b25cIjohMCxcImRhdGEtY2FuY2VsXCI6ITAsc3R5bGU6dC5jYW5jZWxCdXR0b25TdHlsZXx8SyxvbkNsaWNrOmE9Pnt2YXIgZixwO1UodC5jYW5jZWwpJiZQJiYoKHA9KGY9dC5jYW5jZWwpLm9uQ2xpY2spPT1udWxsfHxwLmNhbGwoZixhKSxMKCkpfSxjbGFzc05hbWU6VChyPT1udWxsP3ZvaWQgMDpyLmNhbmNlbEJ1dHRvbiwoTnQ9dD09bnVsbD92b2lkIDA6dC5jbGFzc05hbWVzKT09bnVsbD92b2lkIDA6TnQuY2FuY2VsQnV0dG9uKX0sdC5jYW5jZWwubGFiZWwpOm51bGwsZS5pc1ZhbGlkRWxlbWVudCh0LmFjdGlvbik/dC5hY3Rpb246dC5hY3Rpb24mJlUodC5hY3Rpb24pP2UuY3JlYXRlRWxlbWVudChcImJ1dHRvblwiLHtcImRhdGEtYnV0dG9uXCI6ITAsXCJkYXRhLWFjdGlvblwiOiEwLHN0eWxlOnQuYWN0aW9uQnV0dG9uU3R5bGV8fFosb25DbGljazphPT57dmFyIGYscDtVKHQuYWN0aW9uKSYmKGEuZGVmYXVsdFByZXZlbnRlZHx8KChwPShmPXQuYWN0aW9uKS5vbkNsaWNrKT09bnVsbHx8cC5jYWxsKGYsYSksTCgpKSl9LGNsYXNzTmFtZTpUKHI9PW51bGw/dm9pZCAwOnIuYWN0aW9uQnV0dG9uLChQdD10PT1udWxsP3ZvaWQgMDp0LmNsYXNzTmFtZXMpPT1udWxsP3ZvaWQgMDpQdC5hY3Rpb25CdXR0b24pfSx0LmFjdGlvbi5sYWJlbCk6bnVsbCkpfTtmdW5jdGlvbiBIdCgpe2lmKHR5cGVvZiB3aW5kb3c9PVwidW5kZWZpbmVkXCJ8fHR5cGVvZiBkb2N1bWVudD09XCJ1bmRlZmluZWRcIilyZXR1cm5cImx0clwiO2xldCBzPWRvY3VtZW50LmRvY3VtZW50RWxlbWVudC5nZXRBdHRyaWJ1dGUoXCJkaXJcIik7cmV0dXJuIHM9PT1cImF1dG9cInx8IXM/d2luZG93LmdldENvbXB1dGVkU3R5bGUoZG9jdW1lbnQuZG9jdW1lbnRFbGVtZW50KS5kaXJlY3Rpb246c31mdW5jdGlvbiB3ZSgpe2xldFtzLG9dPWUudXNlU3RhdGUoW10pO3JldHVybiBlLnVzZUVmZmVjdCgoKT0+di5zdWJzY3JpYmUodD0+e28obj0+e2lmKFwiZGlzbWlzc1wiaW4gdCYmdC5kaXNtaXNzKXJldHVybiBuLmZpbHRlcih1PT51LmlkIT09dC5pZCk7bGV0IGg9bi5maW5kSW5kZXgodT0+dS5pZD09PXQuaWQpO2lmKGghPT0tMSl7bGV0IHU9Wy4uLm5dO3JldHVybiB1W2hdPXsuLi51W2hdLC4uLnR9LHV9ZWxzZSByZXR1cm5bdCwuLi5uXX0pfSksW10pLHt0b2FzdHM6c319dmFyIFRlPXM9PntsZXR7aW52ZXJ0Om8scG9zaXRpb246dD1cImJvdHRvbS1yaWdodFwiLGhvdGtleTpuPVtcImFsdEtleVwiLFwiS2V5VFwiXSxleHBhbmQ6aCxjbG9zZUJ1dHRvbjp1LGNsYXNzTmFtZTpnLG9mZnNldDpiLHRoZW1lOmQ9XCJsaWdodFwiLHJpY2hDb2xvcnM6cSxkdXJhdGlvbjokLHN0eWxlOlYsdmlzaWJsZVRvYXN0czpRPXF0LHRvYXN0T3B0aW9uczppLGRpcjpPPUh0KCksZ2FwOks9ZWUsbG9hZGluZ0ljb246WixpY29uczp0dCxjb250YWluZXJBcmlhTGFiZWw6ZXQ9XCJOb3RpZmljYXRpb25zXCIscGF1c2VXaGVuUGFnZUlzSGlkZGVuOlgsY246b3Q9bmV9PXMsW3csal09ZS51c2VTdGF0ZShbXSksVz1lLnVzZU1lbW8oKCk9PkFycmF5LmZyb20obmV3IFNldChbdF0uY29uY2F0KHcuZmlsdGVyKGM9PmMucG9zaXRpb24pLm1hcChjPT5jLnBvc2l0aW9uKSkpKSxbdyx0XSksW3IsSV09ZS51c2VTdGF0ZShbXSksW2F0LGtdPWUudXNlU3RhdGUoITEpLFtULHpdPWUudXNlU3RhdGUoITEpLFtudCxEXT1lLnVzZVN0YXRlKGQhPT1cInN5c3RlbVwiP2Q6dHlwZW9mIHdpbmRvdyE9XCJ1bmRlZmluZWRcIiYmd2luZG93Lm1hdGNoTWVkaWEmJndpbmRvdy5tYXRjaE1lZGlhKFwiKHByZWZlcnMtY29sb3Itc2NoZW1lOiBkYXJrKVwiKS5tYXRjaGVzP1wiZGFya1wiOlwibGlnaHRcIiksSD1lLnVzZVJlZihudWxsKSxzdD1uLmpvaW4oXCIrXCIpLnJlcGxhY2UoL0tleS9nLFwiXCIpLnJlcGxhY2UoL0RpZ2l0L2csXCJcIiksTj1lLnVzZVJlZihudWxsKSxNPWUudXNlUmVmKCExKSxydD1lLnVzZUNhbGxiYWNrKGM9Pnt2YXIgbTsobT13LmZpbmQoeT0+eS5pZD09PWMuaWQpKSE9bnVsbCYmbS5kZWxldGV8fHYuZGlzbWlzcyhjLmlkKSxqKHk9PnkuZmlsdGVyKCh7aWQ6U30pPT5TIT09Yy5pZCkpfSxbd10pO3JldHVybiBlLnVzZUVmZmVjdCgoKT0+di5zdWJzY3JpYmUoYz0+e2lmKGMuZGlzbWlzcyl7aihtPT5tLm1hcCh5PT55LmlkPT09Yy5pZD97Li4ueSxkZWxldGU6ITB9OnkpKTtyZXR1cm59c2V0VGltZW91dCgoKT0+e0d0LmZsdXNoU3luYygoKT0+e2oobT0+e2xldCB5PW0uZmluZEluZGV4KFM9PlMuaWQ9PT1jLmlkKTtyZXR1cm4geSE9PS0xP1suLi5tLnNsaWNlKDAseSksey4uLm1beV0sLi4uY30sLi4ubS5zbGljZSh5KzEpXTpbYywuLi5tXX0pfSl9KX0pLFtdKSxlLnVzZUVmZmVjdCgoKT0+e2lmKGQhPT1cInN5c3RlbVwiKXtEKGQpO3JldHVybn1kPT09XCJzeXN0ZW1cIiYmKHdpbmRvdy5tYXRjaE1lZGlhJiZ3aW5kb3cubWF0Y2hNZWRpYShcIihwcmVmZXJzLWNvbG9yLXNjaGVtZTogZGFyaylcIikubWF0Y2hlcz9EKFwiZGFya1wiKTpEKFwibGlnaHRcIikpLHR5cGVvZiB3aW5kb3chPVwidW5kZWZpbmVkXCImJndpbmRvdy5tYXRjaE1lZGlhKFwiKHByZWZlcnMtY29sb3Itc2NoZW1lOiBkYXJrKVwiKS5hZGRFdmVudExpc3RlbmVyKFwiY2hhbmdlXCIsKHttYXRjaGVzOmN9KT0+e0QoYz9cImRhcmtcIjpcImxpZ2h0XCIpfSl9LFtkXSksZS51c2VFZmZlY3QoKCk9Pnt3Lmxlbmd0aDw9MSYmayghMSl9LFt3XSksZS51c2VFZmZlY3QoKCk9PntsZXQgYz1tPT57dmFyIFMsQTtuLmV2ZXJ5KGw9Pm1bbF18fG0uY29kZT09PWwpJiYoayghMCksKFM9SC5jdXJyZW50KT09bnVsbHx8Uy5mb2N1cygpKSxtLmNvZGU9PT1cIkVzY2FwZVwiJiYoZG9jdW1lbnQuYWN0aXZlRWxlbWVudD09PUguY3VycmVudHx8KEE9SC5jdXJyZW50KSE9bnVsbCYmQS5jb250YWlucyhkb2N1bWVudC5hY3RpdmVFbGVtZW50KSkmJmsoITEpfTtyZXR1cm4gZG9jdW1lbnQuYWRkRXZlbnRMaXN0ZW5lcihcImtleWRvd25cIixjKSwoKT0+ZG9jdW1lbnQucmVtb3ZlRXZlbnRMaXN0ZW5lcihcImtleWRvd25cIixjKX0sW25dKSxlLnVzZUVmZmVjdCgoKT0+e2lmKEguY3VycmVudClyZXR1cm4oKT0+e04uY3VycmVudCYmKE4uY3VycmVudC5mb2N1cyh7cHJldmVudFNjcm9sbDohMH0pLE4uY3VycmVudD1udWxsLE0uY3VycmVudD0hMSl9fSxbSC5jdXJyZW50XSksdy5sZW5ndGg/ZS5jcmVhdGVFbGVtZW50KFwic2VjdGlvblwiLHtcImFyaWEtbGFiZWxcIjpgJHtldH0gJHtzdH1gLHRhYkluZGV4Oi0xfSxXLm1hcCgoYyxtKT0+e3ZhciBBO2xldFt5LFNdPWMuc3BsaXQoXCItXCIpO3JldHVybiBlLmNyZWF0ZUVsZW1lbnQoXCJvbFwiLHtrZXk6YyxkaXI6Tz09PVwiYXV0b1wiP0h0KCk6Tyx0YWJJbmRleDotMSxyZWY6SCxjbGFzc05hbWU6ZyxcImRhdGEtc29ubmVyLXRvYXN0ZXJcIjohMCxcImRhdGEtdGhlbWVcIjpudCxcImRhdGEteS1wb3NpdGlvblwiOnksXCJkYXRhLXgtcG9zaXRpb25cIjpTLHN0eWxlOntcIi0tZnJvbnQtdG9hc3QtaGVpZ2h0XCI6YCR7KChBPXJbMF0pPT1udWxsP3ZvaWQgMDpBLmhlaWdodCl8fDB9cHhgLFwiLS1vZmZzZXRcIjp0eXBlb2YgYj09XCJudW1iZXJcIj9gJHtifXB4YDpifHxRdCxcIi0td2lkdGhcIjpgJHt0ZX1weGAsXCItLWdhcFwiOmAke0t9cHhgLC4uLlZ9LG9uQmx1cjpsPT57TS5jdXJyZW50JiYhbC5jdXJyZW50VGFyZ2V0LmNvbnRhaW5zKGwucmVsYXRlZFRhcmdldCkmJihNLmN1cnJlbnQ9ITEsTi5jdXJyZW50JiYoTi5jdXJyZW50LmZvY3VzKHtwcmV2ZW50U2Nyb2xsOiEwfSksTi5jdXJyZW50PW51bGwpKX0sb25Gb2N1czpsPT57bC50YXJnZXQgaW5zdGFuY2VvZiBIVE1MRWxlbWVudCYmbC50YXJnZXQuZGF0YXNldC5kaXNtaXNzaWJsZT09PVwiZmFsc2VcInx8TS5jdXJyZW50fHwoTS5jdXJyZW50PSEwLE4uY3VycmVudD1sLnJlbGF0ZWRUYXJnZXQpfSxvbk1vdXNlRW50ZXI6KCk9PmsoITApLG9uTW91c2VNb3ZlOigpPT5rKCEwKSxvbk1vdXNlTGVhdmU6KCk9PntUfHxrKCExKX0sb25Qb2ludGVyRG93bjpsPT57bC50YXJnZXQgaW5zdGFuY2VvZiBIVE1MRWxlbWVudCYmbC50YXJnZXQuZGF0YXNldC5kaXNtaXNzaWJsZT09PVwiZmFsc2VcInx8eighMCl9LG9uUG9pbnRlclVwOigpPT56KCExKX0sdy5maWx0ZXIobD0+IWwucG9zaXRpb24mJm09PT0wfHxsLnBvc2l0aW9uPT09YykubWFwKChsLF8pPT57dmFyIEoseDtyZXR1cm4gZS5jcmVhdGVFbGVtZW50KHNlLHtrZXk6bC5pZCxpY29uczp0dCxpbmRleDpfLHRvYXN0OmwsZGVmYXVsdFJpY2hDb2xvcnM6cSxkdXJhdGlvbjooSj1pPT1udWxsP3ZvaWQgMDppLmR1cmF0aW9uKSE9bnVsbD9KOiQsY2xhc3NOYW1lOmk9PW51bGw/dm9pZCAwOmkuY2xhc3NOYW1lLGRlc2NyaXB0aW9uQ2xhc3NOYW1lOmk9PW51bGw/dm9pZCAwOmkuZGVzY3JpcHRpb25DbGFzc05hbWUsaW52ZXJ0Om8sdmlzaWJsZVRvYXN0czpRLGNsb3NlQnV0dG9uOih4PWk9PW51bGw/dm9pZCAwOmkuY2xvc2VCdXR0b24pIT1udWxsP3g6dSxpbnRlcmFjdGluZzpULHBvc2l0aW9uOmMsc3R5bGU6aT09bnVsbD92b2lkIDA6aS5zdHlsZSx1bnN0eWxlZDppPT1udWxsP3ZvaWQgMDppLnVuc3R5bGVkLGNsYXNzTmFtZXM6aT09bnVsbD92b2lkIDA6aS5jbGFzc05hbWVzLGNhbmNlbEJ1dHRvblN0eWxlOmk9PW51bGw/dm9pZCAwOmkuY2FuY2VsQnV0dG9uU3R5bGUsYWN0aW9uQnV0dG9uU3R5bGU6aT09bnVsbD92b2lkIDA6aS5hY3Rpb25CdXR0b25TdHlsZSxyZW1vdmVUb2FzdDpydCx0b2FzdHM6dy5maWx0ZXIoUD0+UC5wb3NpdGlvbj09bC5wb3NpdGlvbiksaGVpZ2h0czpyLmZpbHRlcihQPT5QLnBvc2l0aW9uPT1sLnBvc2l0aW9uKSxzZXRIZWlnaHRzOkksZXhwYW5kQnlEZWZhdWx0OmgsZ2FwOkssbG9hZGluZ0ljb246WixleHBhbmRlZDphdCxwYXVzZVdoZW5QYWdlSXNIaWRkZW46WCxjbjpvdH0pfSkpfSkpOm51bGx9O2V4cG9ydHtUZSBhcyBUb2FzdGVyLEp0IGFzIHRvYXN0LHdlIGFzIHVzZVNvbm5lcn07XG4vLyMgc291cmNlTWFwcGluZ1VSTD1pbmRleC5tanMubWFwIiwiLy8gVGhlIG1vZHVsZSBjYWNoZVxudmFyIF9fd2VicGFja19tb2R1bGVfY2FjaGVfXyA9IHt9O1xuXG4vLyBUaGUgcmVxdWlyZSBmdW5jdGlvblxuZnVuY3Rpb24gX193ZWJwYWNrX3JlcXVpcmVfXyhtb2R1bGVJZCkge1xuXHQvLyBDaGVjayBpZiBtb2R1bGUgaXMgaW4gY2FjaGVcblx0dmFyIGNhY2hlZE1vZHVsZSA9IF9fd2VicGFja19tb2R1bGVfY2FjaGVfX1ttb2R1bGVJZF07XG5cdGlmIChjYWNoZWRNb2R1bGUgIT09IHVuZGVmaW5lZCkge1xuXHRcdHJldHVybiBjYWNoZWRNb2R1bGUuZXhwb3J0cztcblx0fVxuXHQvLyBDcmVhdGUgYSBuZXcgbW9kdWxlIChhbmQgcHV0IGl0IGludG8gdGhlIGNhY2hlKVxuXHR2YXIgbW9kdWxlID0gX193ZWJwYWNrX21vZHVsZV9jYWNoZV9fW21vZHVsZUlkXSA9IHtcblx0XHQvLyBubyBtb2R1bGUuaWQgbmVlZGVkXG5cdFx0Ly8gbm8gbW9kdWxlLmxvYWRlZCBuZWVkZWRcblx0XHRleHBvcnRzOiB7fVxuXHR9O1xuXG5cdC8vIEV4ZWN1dGUgdGhlIG1vZHVsZSBmdW5jdGlvblxuXHRfX3dlYnBhY2tfbW9kdWxlc19fW21vZHVsZUlkXShtb2R1bGUsIG1vZHVsZS5leHBvcnRzLCBfX3dlYnBhY2tfcmVxdWlyZV9fKTtcblxuXHQvLyBSZXR1cm4gdGhlIGV4cG9ydHMgb2YgdGhlIG1vZHVsZVxuXHRyZXR1cm4gbW9kdWxlLmV4cG9ydHM7XG59XG5cbiIsIi8vIGdldERlZmF1bHRFeHBvcnQgZnVuY3Rpb24gZm9yIGNvbXBhdGliaWxpdHkgd2l0aCBub24taGFybW9ueSBtb2R1bGVzXG5fX3dlYnBhY2tfcmVxdWlyZV9fLm4gPSAobW9kdWxlKSA9PiB7XG5cdHZhciBnZXR0ZXIgPSBtb2R1bGUgJiYgbW9kdWxlLl9fZXNNb2R1bGUgP1xuXHRcdCgpID0+IChtb2R1bGVbJ2RlZmF1bHQnXSkgOlxuXHRcdCgpID0+IChtb2R1bGUpO1xuXHRfX3dlYnBhY2tfcmVxdWlyZV9fLmQoZ2V0dGVyLCB7IGE6IGdldHRlciB9KTtcblx0cmV0dXJuIGdldHRlcjtcbn07IiwiLy8gZGVmaW5lIGdldHRlciBmdW5jdGlvbnMgZm9yIGhhcm1vbnkgZXhwb3J0c1xuX193ZWJwYWNrX3JlcXVpcmVfXy5kID0gKGV4cG9ydHMsIGRlZmluaXRpb24pID0+IHtcblx0Zm9yKHZhciBrZXkgaW4gZGVmaW5pdGlvbikge1xuXHRcdGlmKF9fd2VicGFja19yZXF1aXJlX18ubyhkZWZpbml0aW9uLCBrZXkpICYmICFfX3dlYnBhY2tfcmVxdWlyZV9fLm8oZXhwb3J0cywga2V5KSkge1xuXHRcdFx0T2JqZWN0LmRlZmluZVByb3BlcnR5KGV4cG9ydHMsIGtleSwgeyBlbnVtZXJhYmxlOiB0cnVlLCBnZXQ6IGRlZmluaXRpb25ba2V5XSB9KTtcblx0XHR9XG5cdH1cbn07IiwiX193ZWJwYWNrX3JlcXVpcmVfXy5nID0gKGZ1bmN0aW9uKCkge1xuXHRpZiAodHlwZW9mIGdsb2JhbFRoaXMgPT09ICdvYmplY3QnKSByZXR1cm4gZ2xvYmFsVGhpcztcblx0dHJ5IHtcblx0XHRyZXR1cm4gdGhpcyB8fCBuZXcgRnVuY3Rpb24oJ3JldHVybiB0aGlzJykoKTtcblx0fSBjYXRjaCAoZSkge1xuXHRcdGlmICh0eXBlb2Ygd2luZG93ID09PSAnb2JqZWN0JykgcmV0dXJuIHdpbmRvdztcblx0fVxufSkoKTsiLCJfX3dlYnBhY2tfcmVxdWlyZV9fLm8gPSAob2JqLCBwcm9wKSA9PiAoT2JqZWN0LnByb3RvdHlwZS5oYXNPd25Qcm9wZXJ0eS5jYWxsKG9iaiwgcHJvcCkpIiwiLy8gZGVmaW5lIF9fZXNNb2R1bGUgb24gZXhwb3J0c1xuX193ZWJwYWNrX3JlcXVpcmVfXy5yID0gKGV4cG9ydHMpID0+IHtcblx0aWYodHlwZW9mIFN5bWJvbCAhPT0gJ3VuZGVmaW5lZCcgJiYgU3ltYm9sLnRvU3RyaW5nVGFnKSB7XG5cdFx0T2JqZWN0LmRlZmluZVByb3BlcnR5KGV4cG9ydHMsIFN5bWJvbC50b1N0cmluZ1RhZywgeyB2YWx1ZTogJ01vZHVsZScgfSk7XG5cdH1cblx0T2JqZWN0LmRlZmluZVByb3BlcnR5KGV4cG9ydHMsICdfX2VzTW9kdWxlJywgeyB2YWx1ZTogdHJ1ZSB9KTtcbn07IiwidmFyIHNjcmlwdFVybDtcbmlmIChfX3dlYnBhY2tfcmVxdWlyZV9fLmcuaW1wb3J0U2NyaXB0cykgc2NyaXB0VXJsID0gX193ZWJwYWNrX3JlcXVpcmVfXy5nLmxvY2F0aW9uICsgXCJcIjtcbnZhciBkb2N1bWVudCA9IF9fd2VicGFja19yZXF1aXJlX18uZy5kb2N1bWVudDtcbmlmICghc2NyaXB0VXJsICYmIGRvY3VtZW50KSB7XG5cdGlmIChkb2N1bWVudC5jdXJyZW50U2NyaXB0KVxuXHRcdHNjcmlwdFVybCA9IGRvY3VtZW50LmN1cnJlbnRTY3JpcHQuc3JjO1xuXHRpZiAoIXNjcmlwdFVybCkge1xuXHRcdHZhciBzY3JpcHRzID0gZG9jdW1lbnQuZ2V0RWxlbWVudHNCeVRhZ05hbWUoXCJzY3JpcHRcIik7XG5cdFx0aWYoc2NyaXB0cy5sZW5ndGgpIHtcblx0XHRcdHZhciBpID0gc2NyaXB0cy5sZW5ndGggLSAxO1xuXHRcdFx0d2hpbGUgKGkgPiAtMSAmJiAoIXNjcmlwdFVybCB8fCAhL15odHRwKHM/KTovLnRlc3Qoc2NyaXB0VXJsKSkpIHNjcmlwdFVybCA9IHNjcmlwdHNbaS0tXS5zcmM7XG5cdFx0fVxuXHR9XG59XG4vLyBXaGVuIHN1cHBvcnRpbmcgYnJvd3NlcnMgd2hlcmUgYW4gYXV0b21hdGljIHB1YmxpY1BhdGggaXMgbm90IHN1cHBvcnRlZCB5b3UgbXVzdCBzcGVjaWZ5IGFuIG91dHB1dC5wdWJsaWNQYXRoIG1hbnVhbGx5IHZpYSBjb25maWd1cmF0aW9uXG4vLyBvciBwYXNzIGFuIGVtcHR5IHN0cmluZyAoXCJcIikgYW5kIHNldCB0aGUgX193ZWJwYWNrX3B1YmxpY19wYXRoX18gdmFyaWFibGUgZnJvbSB5b3VyIGNvZGUgdG8gdXNlIHlvdXIgb3duIGxvZ2ljLlxuaWYgKCFzY3JpcHRVcmwpIHRocm93IG5ldyBFcnJvcihcIkF1dG9tYXRpYyBwdWJsaWNQYXRoIGlzIG5vdCBzdXBwb3J0ZWQgaW4gdGhpcyBicm93c2VyXCIpO1xuc2NyaXB0VXJsID0gc2NyaXB0VXJsLnJlcGxhY2UoLyMuKiQvLCBcIlwiKS5yZXBsYWNlKC9cXD8uKiQvLCBcIlwiKS5yZXBsYWNlKC9cXC9bXlxcL10rJC8sIFwiL1wiKTtcbl9fd2VicGFja19yZXF1aXJlX18ucCA9IHNjcmlwdFVybDsiLCJpbXBvcnQgZG9tUmVhZHkgZnJvbSAnQHdvcmRwcmVzcy9kb20tcmVhZHknO1xyXG5pbXBvcnQgeyBjcmVhdGVSb290IH0gZnJvbSAnQHdvcmRwcmVzcy9lbGVtZW50JztcclxuaW1wb3J0IERhc2hib2FyZCBmcm9tICcuL3BhZ2VzJztcclxuXHJcbmltcG9ydCAnLi9zY3NzL3N0eWxlLnNjc3MnO1xyXG5cclxuZG9tUmVhZHkoKCkgPT4ge1xyXG4gICAgY29uc3Qgcm9vdCA9IGNyZWF0ZVJvb3QoZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ2N3LWRhc2hib2FyZCcpKTtcclxuICAgIHJvb3QucmVuZGVyKFxyXG4gICAgICAgIDw+XHJcbiAgICAgICAgICAgIDxEYXNoYm9hcmQgLz5cclxuICAgICAgICA8Lz5cclxuICAgICk7XHJcbn0pOyJdLCJuYW1lcyI6WyJJY29uIiwiQ2FyZCIsImNhcmRMaXN0IiwiY2FyZFBsYWNlIiwiY2FyZENvbCIsImNhcmRMaXN0aW5nIiwiY2FyZCIsIm1hcCIsImNhcmRpdGVtIiwiaW5kZXgiLCJjcmVhdGVFbGVtZW50IiwiY2xhc3NOYW1lIiwia2V5IiwiaWNvblN2ZyIsImltYWdldXJsIiwiaGVhZGluZ1VybCIsInRhcmdldCIsImhyZWYiLCJzcmMiLCJoZWFkaW5nIiwicGFyYSIsImJ1dHRvblVybCIsImJ1dHRvblRleHQiLCJpY29uIiwiY2xhc3NlcyIsIkZyYWdtZW50IiwiSGVhZGluZyIsIm9wZW5Jbk5ld1RhYiIsImljb25zIiwiZ2xvYmUiLCJ3aWR0aCIsImhlaWdodCIsInZpZXdCb3giLCJmaWxsIiwieG1sbnMiLCJjbGlwUGF0aCIsImQiLCJzdHJva2UiLCJzdHJva2VXaWR0aCIsInN0cm9rbGluZWNhcCIsInN0cm9rZUxpbmVqb2luIiwiaWQiLCJzaXRlIiwieCIsInJ4IiwieDEiLCJ5MSIsIngyIiwieTIiLCJncmFkaWVudFVuaXRzIiwic3RvcENvbG9yIiwib2Zmc2V0IiwiY29sb3JzZXR0aW5nIiwidHJhbnNmb3JtIiwidHlwb2dyYXBoeXNldHRpbmciLCJsYXlvdXRzZXR0aW5nIiwiZnJvbnRwYWdlc2V0dGluZyIsImdlbmVyYWxzZXR0aW5nIiwiaW5zdGFncmFtc2V0dGluZyIsInNvY2lhbG1lZGlhIiwiZm9vdGVyc2V0dGluZyIsInN0cm9rZUxpbmVjYXAiLCJob21lIiwiZnJlZVBybyIsIm9mZmVycyIsInBsdWdpbnMiLCJsaWNlbnNlIiwiYXJyb3ciLCJ5b3V0dWJlIiwiZmlsbFJ1bGUiLCJjbGlwUnVsZSIsInN1cHBvcnQiLCJkb2MiLCJsb2NrIiwiZG9jdW1lbnRhdGlvbiIsInN1cHBvcnRUd28iLCJ2aWRlbyIsImFycm93dHdvIiwicHJvTG9nbyIsInhsaW5rIiwicGF0dGVybkNvbnRlbnRVbml0cyIsInByZXZpZXciLCJoaWRlUGFzc293cmQiLCJtaW51cyIsInBsdXMiLCJwbHVnaW5MaXN0Iiwic2lkZWJhciIsInN0YXIiLCJyZXZpZXciLCJ0b29sdGlwIiwibGFiZWwiLCJ2aXBTaXRlQ2FyZSIsInNhbGVzRnVubmVsIiwiY3VzdG9tRm9udHMiLCJ0aGVtZUNsdWIiLCJfXyIsIk9mZmVyIiwib2ZmZXJMaXN0IiwiYnV0dG9uVHdvIiwiYnV0dG9uVHdvVXJsIiwiY3dfZGFzaGJvYXJkIiwidGhlbWVfY2x1Yl91cGdyYWRlIiwic2FsZXNfZnVubmVsIiwiY3VzdG9tX2ZvbnRzIiwidmlwX3NpdGVfY2FyZSIsIm9mZmVyTGlzdGluZyIsIml0ZW0iLCJhbHQiLCJSZWFjdCIsIlNpZGViYXIiLCJzaWRlYmFyU2V0dGluZ3MiLCJzaWRlYmFyTGlzdGluZyIsInNpZGViYXJpdGVtIiwiVGFiSGVhZGVyIiwidGl0bGUiLCJkb2NMaW5rcyIsIm5hbWUiLCJsaW5rIiwid2Vic2l0ZSIsInZpZGVvdHV0b3JpYWwiLCJkb2NtZW50YXRpb24iLCJkb2NMaW5rTGlzdGluZyIsImxpc3QiLCJ0aGVtZV92ZXJzaW9uIiwidXNlVGFicyIsImxvZ28iLCJUYWIiLCJ0YWJzRGF0YSIsIm9uQ2hhbmdlIiwiYWN0aXZlVGFiVGl0bGUiLCJyZW5kZXJUYWJzIiwicmVuZGVyQ29udGVudCIsInVzZVJlZiIsInVzZVN0YXRlIiwidXNlRWZmZWN0IiwidXNlTWVtbyIsInVzZUNhbGxiYWNrIiwiaW5pdGlhbFRhYnMiLCJpbml0aWFsQWN0aXZlVGFiIiwidGFic1JlZiIsImFjdGl2ZVRhYiIsInNldEFjdGl2ZVRhYiIsImhhbmRsZVRhYkNsaWNrIiwibmV3SGFzaCIsImN1cnJlbnQiLCJ0b0xvd2VyQ2FzZSIsInJlcGxhY2UiLCJ3aW5kb3ciLCJsb2NhdGlvbiIsImhhc2giLCJjaGVja0hhc2giLCJzdWJzdHJpbmciLCJ0YWJJbmRleCIsImZpbmRJbmRleCIsInRhYiIsImFkZEV2ZW50TGlzdGVuZXIiLCJyZW1vdmVFdmVudExpc3RlbmVyIiwib25DbGljayIsImNvbnRlbnQiLCJkZWZhdWx0Iiwib2ZmZXJPbmUiLCJTRU8iLCJHRFBSIiwidGhlbWVJbnN0YWxsIiwibWFpbkRlbW8iLCJkZW1vMiIsImRlbW8zIiwiRkFRIiwiZmFxQ29udGVudCIsImRlc2NyaXB0aW9uIiwiYWNjb3VudCIsIm9wZW5JbmRleCIsInNldE9wZW5JbmRleCIsInNldEhlaWdodCIsImNvbnRlbnRSZWYiLCJzY3JvbGxIZWlnaHQiLCJ0b2dnbGVEZXNjcmlwdGlvbiIsInJlZiIsInN0eWxlIiwibWF4SGVpZ2h0Iiwib3ZlcmZsb3ciLCJ0cmFuc2l0aW9uIiwiSG9tZXBhZ2UiLCJjYXJkTGlzdHMiLCJjdXN0b21fbG9nbyIsImNvbG9ycyIsInR5cG9ncmFwaHkiLCJsYXlvdXQiLCJwZXJmb3JtYW5jZSIsImZyb250IiwiZ2VuZXJhbCIsImZvb3RlciIsImZyYW1lQm9yZGVyIiwiYWxsb3ciLCJyZWZlcnJlclBvbGljeSIsImFsbG93RnVsbFNjcmVlbiIsImN1c3RvbWl6ZXJfdXJsIiwic3ByaW50ZiIsIlNwaW5uZXIiLCJ0b2FzdCIsIkxpY2Vuc2UiLCJzaG93UGFzc3dvcmQiLCJzZXRTaG93UGFzc3dvcmQiLCJsaWNlbnNlS2V5Iiwic2V0TGljZW5zZUtleSIsImlzQVBJSk9CIiwic2V0SXNBUElKT0IiLCJzYXZlZExpY2Vuc2UiLCJzZXRTYXZlZExpY2Vuc2UiLCJsaWNlbnNlU3RhdHVzIiwic2V0TGljZW5zZVN0YXR1cyIsInN0YXR1cyIsIm1lc3NhZ2UiLCJpc0xvYWRpbmciLCJzZXRpc0xvYWRpbmciLCJhY3RpdmF0ZUxpY2Vuc2UiLCJlIiwiZmV0Y2giLCJhamF4X3VybCIsIkxpY2Vuc2VOb25jZSIsImhlYWRlcnMiLCJBY2NlcHQiLCJtZXRob2QiLCJib2R5IiwiSlNPTiIsInN0cmluZ2lmeSIsInNlY3VyaXR5IiwidGhlbiIsInIiLCJqc29uIiwic3VjY2VzcyIsImRhdGEiLCJlcnJvciIsImRlQWN0aXZhdGVMaWNlbnNlIiwiaGFuZGxlU2hvd1Bhc3N3b3JkIiwiaGFuZGxlUmVzZXRMaWNlbnNlIiwiYmxvZ19uYW1lIiwiZGFuZ2Vyb3VzbHlTZXRJbm5lckhUTUwiLCJfX2h0bWwiLCJhY3Rpb24iLCJhdXRvQ29tcGxldGUiLCJvblN1Ym1pdCIsInByZXZlbnREZWZhdWx0IiwicmVxdWlyZWQiLCJkaXNhYmxlZCIsInZhbHVlIiwidHlwZSIsImV2ZW50IiwicGxhY2Vob2xkZXIiLCJodG1sRm9yIiwiYmFja2dyb3VuZCIsIm1hcmdpbkxlZnQiLCJjeCIsImN5IiwiYXR0cmlidXRlTmFtZSIsImNhbGNNb2RlIiwidmFsdWVzIiwia2V5VGltZXMiLCJkdXIiLCJiZWdpbiIsInJlcGVhdENvdW50IiwiT2ZmZXJzIiwidGhlbWVfaW5zdGFsbCIsImdkcHJfc2V0dXAiLCJzZW9fc2V0dXAiLCJwbHVnaW5fc2V0dXAiLCJ2aXBfc3VwcG9ydCIsIlN0YXJ0ZXJTaXRlcyIsImJ1dHRvblN0YXRlIiwic2V0QnV0dG9uU3RhdGUiLCJhY3RpdmF0ZVVybCIsInNldEFjdGl2YXRlVXJsIiwiZGVtb1VybCIsImFkbWluX3VybCIsImluYWN0aXZlUGx1Z2lucyIsImFjdGl2ZVBsdWdpbnMiLCJkZW1vSW1wb3J0ZXJQbHVzIiwiZmluZCIsInBsdWdpbiIsInNsdWciLCJ1cmwiLCJkZW1vSW1wb3J0ZXJQbHVzQWN0aXZlIiwiaGFuZGxlRGVtb0ltcG9ydGVyIiwid3AiLCJ1cGRhdGVzIiwiaW5zdGFsbFBsdWdpbiIsInJlc3BvbnNlIiwiY29uc29sZSIsImFjdGl2YXRlUGx1Z2lucyIsInVybE9iaiIsIlVSTCIsIlVSTFNlYXJjaFBhcmFtcyIsIl93cG5vbmNlIiwic2VhcmNoUGFyYW1zIiwiZ2V0IiwidG9TdHJpbmciLCJvayIsIkVycm9yIiwicGx1Z2luTmFtZSIsIm9iamVjdEV4aXN0c0luQXJyYXkiLCJvYmoiLCJhcnJheSIsInNvbWUiLCJlbCIsIlVzZWZ1bFBsdWdpbnMiLCJpbml0aWFsU3RhdGUiLCJmb3JFYWNoIiwiYWN0aXZhdGVVcmxzIiwic2V0QWN0aXZhdGVVcmxzIiwibmV3QnV0dG9uU3RhdGUiLCJwcmV2U3RhdGUiLCJ1cmxzIiwicHJldlVybHMiLCJhY3RpdmF0ZVBsdWdpbiIsIlRvYXN0ZXIiLCJEYXNoYm9hcmQiLCJzZXRBY3RpdmVUYWJUaXRsZSIsImhhbmRsZVRhYkNoYW5nZSIsInJpY2hDb2xvcnMiLCJjbG9zZUJ1dHRvbiIsImRvbVJlYWR5IiwiY3JlYXRlUm9vdCIsInJvb3QiLCJkb2N1bWVudCIsImdldEVsZW1lbnRCeUlkIiwicmVuZGVyIl0sInNvdXJjZVJvb3QiOiIifQ==