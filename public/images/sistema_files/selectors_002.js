define(["require","exports"],function(e,t){"use strict";function i(e){return e.fileActivity}function n(e){return i(e).activities.value}function r(e){return i(e).activities}function u(e){return i(e).feedback}function c(e){return u(e).responded}function o(e){return n(e).length}function f(e){return i(e).file}function d(e){return i(e).userId}function s(e){return{file:f(e),userId:d(e)}}Object.defineProperty(t,"__esModule",{value:!0}),t.getState=i,t.getActivities=n,t.getActivitiesMetadata=r,t.getFeedbackState=u,t.didRespondToFeedback=c,t.getVisibleActivityCount=o,t.getFile=f,t.getUserId=d,t.getContext=s});
//# sourceMappingURL=selectors.min.js-vflcJSC9g.map