define(["require","exports","external/react","spectrum/popover","modules/clean/react/file_action_button_type","modules/clean/react/file_viewer/more_dropdown/models","modules/clean/react/title_bar/overflow_menu"],function(e,o,t,n,r,i,p){"use strict";function c(e){return e.length&&e[0].type===n.PopoverContentSeparator?e.slice(1):e}function u(e){var o=r.getFileActionButtonText(e.fileActionButtonType);return t.createElement(p.PopoverOrMobileItem,{className:e.className,key:"file_action_button_type_"+e.fileActionButtonType,onSelect:e.handler},e.component?t.createElement(e.component,{buttonType:e.fileActionButtonType,buttonText:o}):o)}function a(e){return e instanceof i.MoreOption?[u(e)]:e.options.map(function(e){return u(e)})}function l(e){var o=[],r=i.MoreOption;return e.forEach(function(e,p){(e instanceof i.MoreOptionGroup||r===i.MoreOptionGroup)&&o.push(t.createElement(n.PopoverContentSeparator,{key:e instanceof i.MoreOptionGroup?"more_options__separator-group_"+e.fileActionButtonGroup:"more_options__separator-option_"+e.fileActionButtonType})),r=e instanceof i.MoreOption?i.MoreOption:i.MoreOptionGroup,o=o.concat(a(e))}),c(o)}Object.defineProperty(o,"__esModule",{value:!0}),o.getPopoverOrMobileItemForMoreOption=u,o.getPopoverOrMobileItemsForMoreOptions=l});
//# sourceMappingURL=views.min.js-vfld4icOL.map