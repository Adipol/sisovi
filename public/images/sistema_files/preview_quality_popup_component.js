define(["require","exports","tslib","external/react","modules/clean/filepath","modules/clean/loggers/file_preview_logger","modules/clean/react/css_timing","modules/clean/react/file_viewer/actions","modules/clean/react/file_viewer/constants","modules/clean/react/file_viewer/models","modules/clean/react/previews/quality_popup/constants","modules/clean/react/previews/quality_popup/questions","modules/clean/react/previews/quality_popup/feedback_modal","modules/clean/react/file_viewer/file_utils","modules/clean/react/sprite","modules/clean/react/file_viewer/file_preview_event_emitter","modules/core/i18n","modules/core/notify"],function(e,t,i,o,s,n,r,l,a,p,u,c,d,m,v,f,w,h){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var P=(function(e){function t(){var t=null!==e&&e.apply(this,arguments)||this;return t.state={},t.handleDismissPopup=function(){t.recordDismissed(u.QualityPopupStage.POPUP),t.hidePopup()},t.handleAnswerYes=function(){t.recordAnswer(t.state.question,u.BooleanAnswers.YES),t.feedbackReceived()},t.handleAnswerNo=function(){t.recordAnswer(t.state.question,u.BooleanAnswers.NO),c.shouldShowFeedbackModal(t.state.question)?t.showFeedbackModal():t.feedbackReceived()},t.handleModalDone=function(e,i){var o={};o[c.Questions.FEEDBACK]=i||"",o[c.Questions.DONATE]=e?u.BooleanAnswers.YES:u.BooleanAnswers.NO;var s={};e&&(s._file_nsid=t.props.file.ns_id,s._file_sjid=t.props.file.sjid),t.recordMultipleAnswers(o,s),t.feedbackReceived()},t.handleModalDismiss=function(){t.recordDismissed(u.QualityPopupStage.FEEDBACK_MODAL)},t}return i.__extends(t,e),t.prototype.componentDidMount=function(){var e=this.props.file,t=s.file_extension(s.filename(e.fq_path));this.popupLogger=new n.FilePreviewQualityPopupLogger,this.popupLogger.listenTo(f.filePreviewEventEmitter),this.handlePreviewOpen(t)},t.prototype.componentWillUnmount=function(){this.popupLogger.unlistenTo(f.filePreviewEventEmitter)},t.prototype.recordQuestions=function(){for(var e=[],t=0;t<arguments.length;t++)e[t]=arguments[t];var i=p.FilePreviewSession.currentSession;f.filePreviewEventEmitter.emit(a.EventType.FilePreviewQualityPopupAsked,i,e)},t.prototype.recordAnswer=function(e,t){var i={};i[e]=t,this.recordMultipleAnswers(i)},t.prototype.recordMultipleAnswers=function(e,t){void 0===t&&(t={});var i=p.FilePreviewSession.currentSession;f.filePreviewEventEmitter.emit(a.EventType.FilePreviewQualityPopupAnswered,i,e,t)},t.prototype.recordDismissed=function(e){var t=p.FilePreviewSession.currentSession;f.filePreviewEventEmitter.emit(a.EventType.FilePreviewQualityPopupDismissed,t,e)},t.prototype.showFeedbackModal=function(){var e=o.createElement(d.PreviewFeedbackModal,{filename:s.filename(this.props.file.fq_path),allowFileDonation:this.props.allowFileDonation,onDone:this.handleModalDone,onDismiss:this.handleModalDismiss});this.recordQuestions(c.Questions.FEEDBACK,c.Questions.DONATE),d.PreviewFeedbackModal.showInstance(e)},t.prototype.feedbackReceived=function(){h.Notify.success(w._("Thanks! Your feedback will help improve Dropbox."),3),this.hidePopup()},t.prototype.hidePopup=function(){this.setState({question:void 0}),l.closePreviewQualityPopup()},t.prototype.randomNum=function(e,t){return void 0===t&&(t=0),Math.random()*(e-t)+t},t.prototype.handlePreviewOpen=function(e){if(!(this.randomNum(100)>this.props.showProbability)){var t=c.getQuestionToAsk(e);null!==t&&(this.setState({question:t}),this.recordQuestions(t))}},t.prototype.render=function(){return void 0===this.state.question?null:o.createElement("div",{id:"preview-quality-popup",className:"preview-quality-bar fadeout"},o.createElement("div",{className:"container"},o.createElement("div",{className:"title"},c.getQuestionWording(this.state.question,m.getExtension(this.props.file)),o.createElement("div",{className:"resolution"},o.createElement("button",{className:"button-as-link looks-good-link",onClick:this.handleAnswerYes},w._("Yes")),o.createElement("span",{className:""},w._("•")),o.createElement("button",{className:"button-as-link something-wrong-link",onClick:this.handleAnswerNo},w._("No")))),o.createElement("div",{className:"hide_button"},o.createElement("button",{className:"button-as-link dismiss-link",onClick:this.handleDismissPopup},o.createElement(v.Sprite,{group:"web",name:"x",alt:w._("Close")})))),o.createElement("hr",{className:"separator"}))},t})(o.Component);t._PreviewQualityPopup=P;var _=r.requireCssWithComponent(P,["/static/css/preview_quality_popup-vflyrlOUZ.css"]);t.PreviewQualityPopup=_});
//# sourceMappingURL=preview_quality_popup_component.min.js-vfl1sXIl_.map