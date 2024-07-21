import { css } from "@emotion/react";

const styles = css`
  @keyframes fadeInDown {
    0% {
      transform: translateY(-20px) scaleY(0);
      visibility: hidden;
      opacity: 0;
      transform-origin: top;
    }
    100% {
      transform: translateY(0px) scaleY(1);
      visibility: visible;
      opacity: 1;
      transform-origin: top;
    }
  }
  @keyframes fadeInUp {
    0% {
      transform: translateY(20px) scaleY(0);
      visibility: hidden;
      opacity: 0;
      transform-origin: bottom;
    }
    100% {
      transform: translateY(0px) scaleY(1);
      visibility: visible;
      opacity: 1;
      transform-origin: bottom;
    }
  }
  body {
    --cw__inactive-color: #93999f;
    --cw__primary-color: #93999f;
    --cw__secondary-color: #216bdb;
    --cw__background-color: #f2f7fc;
    --cw__border-color: #e0e3e7;
    --cw__box-shadow: 0px 1px 2px 0px #1018280f, 0px 1px 3px 0px #1018281a;
    --cw__transition: all 0.2s ease;
    --cw__border-radius: 4px;
    --wp-components-color-accent: var(--cw__secondary-color);
    --wp-admin-theme-color: var(--cw__secondary-color);
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto,
      Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji",
      "Segoe UI Symbol";
    *{
      box-sizing: border-box;
    }
    
    .cw__date-popover {
      background-color: #ffffff;
      font-size: 13px;
      padding: 0.25rem 0.5rem;
      border-radius: var(--cw__border-radius);
      border: 1px solid var(--cw__border-color);
      width: 286px;
    }
    .components-dropdown__content {
      z-index: 99999;
      .components-popover__content {
        padding: 12px;
        background-color: #ffffff;
        border-radius: var(--cw__border-radius);
        box-shadow: var(--cw__box-shadow);
        border: 1px solid var(--cw__border-color);
        width: 286px;
      }
    }
    .components-color-picker {
      width: 100%;
      .react-colorful,
      .react-colorful__alpha,
      .react-colorful__hue {
        width: 100%;
      }
      .react-colorful__saturation {
        border-radius: var(--cw__border-radius);
      }
      > div:not(.react-colorful) {
        > div {
          padding-left: 0;
          padding-right: 0;
          &:last-child {
            padding-bottom: 0;
          }
        }
        .components-button {
          background: none;
          border: none;
        }
      }
      .components-select-control {
        margin-left: 0;
      }
      .components-base-control {
        .components-input-control__container {
          .components-input-control__prefix{
            .components-text{
              padding-left: 10px;
              margin-left: 0;
              color: inherit;
            }
          }
          .components-select-control__input, input.components-input-control__input{
            border: none;
            background-color: var(--cw__background-color);
            min-height: 35px;
            padding: 9px 10px;
          }
          .components-input-control__prefix + input.components-input-control__input{
            padding-left: 28px !important;
          }
        }
        &.components-number-control{
          .components-input-control__container{
            max-width: 64px;
          }
        }
      }
      > div > [data-wp-component="Flex"]{
        padding-top: 8px;
      }
    }
    .components-base-control {
      .components-base-control__field{
        .components-range-control__track,
        .components-range-control__slider + span {
          height: 6px;
        }
        .components-range-control__slider + span {
          background-color: #e0e3e7;
        }
      }
      .components-range-control__tooltip {
        font-size: 13px;
        line-height: 17.3px;
        padding: 8px;
        border-radius: var(--cw__border-radius);
        background-color: #2b3034;
        bottom: 100%;
        margin-bottom: 10px;
        &::after {
          content: "";
          border: 6px solid transparent;
          border-top-color: #2b3034;
          position: absolute;
          top: 100%;
          left: 50%;
          transform: translateX(-50%);
        }
      }
    }
    .components-range-control__wrapper {
      .components-range-control__thumb-wrapper {
        width: 20px;
        height: 20px;
        transform: translateY(-50%);
        top: 50%;
        margin-top: 0;
        margin-left: -11px;
        > span {
          background-color: #ffffff;
          box-shadow: 0 0 0 2px #e6e6e6;
          background-image: url("data:image/svg+xml,%3Csvg width='12' height='6' viewBox='0 0 12 6' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M3.40393 5.22144L1.40393 3.22144L3.40393 1.22144' stroke='%2393999F' strokeLinecap='round' strokeLinejoin='round'/%3E%3Cpath d='M8.73718 1.22144L10.7372 3.22144L8.73718 5.22144' stroke='%2393999F' strokeLinecap='round' strokeLinejoin='round'/%3E%3C/svg%3E%0A");
          background-repeat: no-repeat;
          background-size: 12px;
          background-position: center;
          &::before {
            width: calc(100% + 12px);
            height: calc(100% + 12px);
            top: -6px;
            left: -6px;
            opacity: 0.15;
            z-index: -1;
          }
        }
        > span[class*="-thumbFocus"] {
          box-shadow: 0 0 0 2px var(--cw__secondary-color);
        }
      }
    }
    .components-input-control__container {
      position: relative;
      .components-input-control__prefix {
        position: absolute;
        left: 0;
      }
      .components-input-control__prefix + .components-input-control__input {
        padding-left: 32px !important;
      }
    }
    input[type="text"],
    input[type="number"],
    input[type="email"],
    input[type="url"],
    input[type="search"],
    input[type="date"],
    select,
    textarea,
    .components-base-control__field
      .components-input-control__container
      input.components-input-control__input,
    .components-base-control__field
      .components-input-control__container
      .components-select-control__input {
      background-color: #ffffff;
      border: 1px solid var(--cw__border-color);
      border-radius: var(--cw__border-radius);
      padding: 12.5px 10px;
      font-size: 14px;
      line-height: 1;
      color: #2b3034;
      width: 100%;
      max-width: 100%;
      transition: var(--cw__transition);
      outline: none;
      min-height: 44px;
      &:focus {
        border-color: var(--cw__secondary-color);
      }
    }
    .components-input-control__backdrop {
      display: none;
    }
    .components-circular-option-picker {
      display: flex;
      flex-wrap: wrap;
      align-items: center;
    }
    .components-circular-option-picker__swatches {
      display: flex;
      flex-wrap: wrap;
      gap: 0.5rem;
      .components-circular-option-picker__option {
        display: inline-block;
        width: 25px;
        height: 25px;
        border-radius: 50%;
        border: 1px solid #efefef;
        cursor: pointer;
        &.is-pressed {
          outline: 1px solid #e0e3e7;
          outline-offset: 2px;
        }
      }
      .components-circular-option-picker__option-wrapper {
        position: relative;
        display: flex;
        svg {
          position: absolute;
          left: 0;
          top: 0;
        }
      }
    }
  }
  [data-tippy-root] {
    .cw_popover{
      max-width: 300px !important;
      min-width: 286px;
      .cw__control-item{
        width: unset;
      }
      .tippy-arrow {
        width: 14px;
        height: 14px;
        &::before {
          border: 1px solid transparent !important;
          width: 12px;
          height: 12px;
          background-color: currentColor;
          transform: rotate(45deg);
          transform-origin: center !important;
        }
      }
      &[data-placement^="top"] {
        > .tippy-arrow {
          &::before {
            border-bottom-color: var(--cw__border-color) !important;
            border-right-color: var(--cw__border-color) !important;
          }
        }
      }
      &[data-placement^="bottom"] {
        > .tippy-arrow {
          &::before {
            border-top-color: var(--cw__border-color) !important;
            border-left-color: var(--cw__border-color) !important;
          }
        }
      }
      &[data-placement^="left"] {
        > .tippy-arrow {
          &::before {
            border-top-color: var(--cw__border-color) !important;
            border-right-color: var(--cw__border-color) !important;
          }
        }
      }
      &[data-placement^="right"] {
        > .tippy-arrow {
          &::before {
            border-left-color: var(--cw__border-color) !important;
            border-bottom-color: var(--cw__border-color) !important;
          }
        }
      }
    }
  }
  .cw_popover {
    background-color: #ffffff;
    border: 1px solid var(--cw__border-color);
    border-radius: var(--cw__border-radius);
    padding: 12px;
    box-shadow:
      0px 4px 6px -2px #2b303408,
      0px 12px 16px -4px #2b303414;
    .tippy-content {
      padding: 0;
    }
    &[data-theme="light"] {
      color: #2b3034;
      .tippy-arrow {
        color: #ffffff;
      }
    }
    .cw__control-item {
      margin-bottom: 8px;
      padding: 0 12px;
      margin-left: -12px;
      margin-right: -12px;
      &:first-of-type{
        padding-top: 0;
      }
      &:first-of-type{
        padding-bottom: 0;
      }
      &:last-child {
        margin-bottom: 0;
      }
      &[data-divider*="top"]{
        padding-top: 12px;
      }
      &[data-divider*="bottom"]{
        padding-bottom: 12px;
      }
      &:not(.horizontal){
        > header{
          margin: 0 0 8px;
        }
        .cw__control-description{
          margin: 8px 0;
        }
      }
    }
    .cw__control-title{
      margin: -8px -12px 8px;
    }
  }
  input.cw__date-picker__date-input {
    background-image: url("data:image/svg+xml,%3Csvg width='23' height='20' viewBox='0 0 23 20' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cg clipPath='url(%23clip0_567_9557)'%3E%3Cpath d='M20.9446 2.54545H16.9446V0H15.49V2.54545H6.76274V0H5.30819V2.54545H1.30819C1.01897 2.54579 0.741689 2.66083 0.537177 2.86535C0.332665 3.06986 0.217622 3.34714 0.217285 3.63636V18.9091C0.217622 19.1983 0.332665 19.4756 0.537177 19.6801C0.741689 19.8846 1.01897 19.9997 1.30819 20H20.9446C21.2338 19.9997 21.5111 19.8846 21.7156 19.6801C21.9201 19.4756 22.0351 19.1983 22.0355 18.9091V3.63636C22.0351 3.34714 21.9201 3.06986 21.7156 2.86535C21.5111 2.66083 21.2338 2.54579 20.9446 2.54545ZM20.5809 18.5455H1.67183V4H5.30819V5.81818H6.76274V4H15.49V5.81818H16.9446V4H20.5809V18.5455Z' fill='%23216BDB'/%3E%3Cpath d='M4.58093 8.36377H6.03548V9.81832H4.58093V8.36377ZM8.58093 8.36377H10.0355V9.81832H8.58093V8.36377ZM12.2173 8.36377H13.6718V9.81832H12.2173V8.36377ZM16.2173 8.36377H17.6718V9.81832H16.2173V8.36377ZM4.58093 11.6365H6.03548V13.091H4.58093V11.6365ZM8.58093 11.6365H10.0355V13.091H8.58093V11.6365ZM12.2173 11.6365H13.6718V13.091H12.2173V11.6365ZM16.2173 11.6365H17.6718V13.091H16.2173V11.6365ZM4.58093 14.9092H6.03548V16.3638H4.58093V14.9092ZM8.58093 14.9092H10.0355V16.3638H8.58093V14.9092ZM12.2173 14.9092H13.6718V16.3638H12.2173V14.9092ZM16.2173 14.9092H17.6718V16.3638H16.2173V14.9092Z' fill='%23216BDB'/%3E%3C/g%3E%3Cdefs%3E%3CclipPath id='clip0_567_9557'%3E%3Crect width='21.8182' height='20' fill='white' transform='translate(0.217285)'/%3E%3C/clipPath%3E%3C/defs%3E%3C/svg%3E%0A");
    background-size: 20px;
    background-position: center right 10px;
    background-repeat: no-repeat;
    padding-right: 32px;
  }
  .components-datetime__time {
    .components-datetime__time-field {
      .components-base-control.components-input-control {
        width: 44px !important;
      }
    }
    [class*="-MonthSelectWrapper"] {
      max-width: 126px;
    }
    .components-input-control__input,
    .components-select-control__input {
      padding: 9px 8px !important;
      min-height: unset !important;
      height: 39px !important;
    }
    .components-datetime__time-separator {
      display: flex;
      justify-content: center;
      align-items: center;
      width: 12px;
      border: none;
    }
    .components-button-group {
      background-color: var(--cw__background-color);
      border-radius: var(--cw__border-radius);
      padding: 6px;
      .components-button {
        font-size: 14px;
        line-height: 18.5px;
        padding: 4px 8px;
        border-radius: var(--cw__border-radius);
        background: none;
        border: none;
        text-transform: uppercase;
        cursor: pointer;
        &.is-primary {
          font-weight: 600;
          background-color: #ffffff;
          box-shadow: var(--cw__box-shadow);
          color: var(--cw__secondary-color);
        }
      }
    }
    .components-datetime__timezone {
      text-decoration: underline !important;
    }
    .components-datetime__time-field-day {
      width: 44px !important;
    }
    .components-datetime__time-field-year {
      width: auto !important;
    }
  }
  .components-datetime__date {
    padding: 8px;
    border: 1px solid var(--cw__border-color);
    border-radius: var(--cw__border-radius);
    .components-button {
      background: none;
      border: none;
      cursor: pointer;
      &:not(.components-datetime__date__day) {
        color: var(--cw__secondary-color);
        svg {
          fill: currentColor;
        }
      }
      &[aria-label*="Selected"] {
        background-color: var(--cw__secondary-color);
        color: #ffffff;
      }
    }
  }
`;

export default styles;
