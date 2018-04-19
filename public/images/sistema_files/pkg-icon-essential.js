define("modules/clean/react/icon/folder_icon",["require","exports","tslib","external/react","spectrum/icon_content","modules/clean/react/icon/icon_helper"],function(e,_,i,t,a,r){"use strict";function p(e){var _=e.length,i=e.lastIndexOf("_",_);return parseInt(e.substr(i+1,_),10)?e.substr(0,i):e}Object.defineProperty(_,"__esModule",{value:!0});var o={folder_user:"folder_shared",folder_user_gray:"folder_shared",folder_team:"folder_team",folder_team_gray:"folder_team",folder_team_locked:"folder_team_read_only",folder_team_locked_gray:"folder_team_read_only",folder_user_locked:"folder_shared_read_only",folder_user_locked_gray:"folder_shared_read_only",folder:"folder",folder_gray:"folder",folder_team_member:"folder_team_member",folder_user_no_access:"folder_confidential",folder_app:"folder_app",package:"pkg",folder_camera:"folder_camera_upload",dropbox:"folder_dropbox",folder_user_no_access_admin_view:"folder_confidential_admin_view"};_.getIconForFolder=function(e,_,i){void 0===_&&(_="small"),void 0===i&&(i=!1);var t=e.type,a=e._mount_access_perms,p=!a||a.indexOf("can_edit")!==-1,o=!a||a.indexOf("can_view")!==-1;return r.spectrum_folder_icon({fileType:t,isInTeamFolderTree:i,isCameraUploads:e.is_camera_uploads===!0,isViewOnly:!o||!p,size:"small"===_?r.ICON_SIZES.LARGE:r.ICON_SIZES.XLARGE})},_.isLegacyFolderIcon=function(e){var _=p(e),i=["folder_star","folder_public"];return _ in o||i.includes(_)},_.convertLegacyFolderIconToSpectrum=function(e,_){return(o[p(e)]||"folder")+"-"+_};var d=(function(e){function r(){return null!==e&&e.apply(this,arguments)||this}return i.__extends(r,e),r.prototype.render=function(){var e=this.props,r=e.file,p=e.variant,o=void 0===p?"small":p,d=(e.inTeamFolder,i.__rest(e,["file","variant","inTeamFolder"])),c=r.isDeleted,w=_.convertLegacyFolderIconToSpectrum(r.icon||"",o);return t.createElement(a.IconContent,i.__assign({name:w,disabled:c},d))},r})(t.Component);_.FolderIcon=d}),define("modules/clean/react/icon/icon_helper",["require","exports","modules/clean/filetypes","modules/clean/filepath"],function(e,_,i,t){"use strict";function a(e,i){switch(void 0===i&&(i=_.ICON_SIZES.SMALL),i){case _.ICON_SIZES.LARGE:return e+"_32";case _.ICON_SIZES.XLARGE:return e+"_64";default:return e}}function r(e){switch(e){case _.ICON_SIZES.LARGE:return"small";case _.ICON_SIZES.XLARGE:return"large";default:return"small"}}function p(e,i){return void 0===i&&(i=_.ICON_SIZES.SMALL),e+"-"+r(i)}function o(e,_){var i=(void 0===_?{}:_).size;return a(l[e]||"page_white",i)}function d(e,_){var i=(void 0===_?{}:_).size;return o(t.file_extension(e).toLowerCase(),{size:i})}function c(e){return"s_web_"+n({isInTeamFolderTree:e})}function w(e){var t=void 0===e?{}:e,a=t.fileType,r=void 0===a?i.FileTypes.FOLDER:a,o=t.isInTeamFolderTree,d=void 0!==o&&o,c=t.isCameraUploads,w=void 0!==c&&c,n=t.isViewOnly,l=void 0!==n&&n,g=t.isConfidential,s=void 0!==g&&g,h=t.size,u=void 0===h?_.ICON_SIZES.SMALL:h,f=t.iconPostfix,m=void 0===f?"":f,v="";if(s)return p("folder_confidential"+m,u);switch(r){case i.FileTypes.TEAM_MEMBER_FOLDER:return p("folder_team_member"+m,u);case i.FileTypes.SANDBOX:return p("folder_app"+m,u);case i.FileTypes.PACKAGE:case i.FileTypes.FOLDER:case i.FileTypes.FILE:if(w)return p("folder_camera_upload"+m,u);v=d?"_shared":"";break;case i.FileTypes.SHARED_FOLDER:v="_shared";break;case i.FileTypes.TEAM_SHARED_FOLDER:v="_team"}var y="";return l&&""!==v&&(y="_read_only"),p("folder"+v+y+m,u)}function n(e){var i=void 0===e?{}:e,t=i.isShared,r=void 0!==t&&t,p=i.isDeleted,o=void 0!==p&&p,d=i.isTeamFolder,c=void 0!==d&&d,w=i.isInTeamFolderTree,n=void 0!==w&&w,l=i.isViewOnly,g=void 0!==l&&l,s=i.size,h=void 0===s?_.ICON_SIZES.LARGE:s,u="";c?u="_team":(r||n)&&(u="_user");var f="";g&&""!==u&&(f="_locked");var m="";return o&&(m="_gray"),a("folder"+u+f+m,h)}Object.defineProperty(_,"__esModule",{value:!0});var l={_other:"page_white",log:"page_white",msg:"page_white",sln:"page_white",vcproj:"page_white",txt:"page_white_text",wps:"page_white_text",doc:"page_white_word",docx:"page_white_word",docm:"page_white_word",rtf:"page_white_word",pages:"page_white_word",wpd:"page_white_word",odt:"page_white_word",pdf:"page_white_acrobat",eps:"page_white_acrobat",xls:"page_white_excel",xlsm:"page_white_excel",xlsx:"page_white_excel",xlsb:"page_white_excel",ods:"page_white_excel",csv:"page_white_excel",ppt:"page_white_powerpoint",pptx:"page_white_powerpoint",pptm:"page_white_powerpoint",pps:"page_white_powerpoint",ppsx:"page_white_powerpoint",ppsm:"page_white_powerpoint",odp:"page_white_powerpoint",key:"page_white_keynote",css:"page_white_code",html:"page_white_code",htm:"page_white_code",xml:"page_white_code",php:"page_white_code",c:"page_white_code",h:"page_white_code",rb:"page_white_code",cpp:"page_white_code",java:"page_white_code",js:"page_white_code",json:"page_white_code",cs:"page_white_code",py:"page_white_code",pl:"page_white_code",exe:"page_white_gear",dll:"page_white_gear",app:"page_white_gear",mp3:"page_white_sound",m3u:"page_white_sound",wav:"page_white_sound",m4a:"page_white_sound",wma:"page_white_sound",aif:"page_white_sound",iff:"page_white_sound",mid:"page_white_sound",mpa:"page_white_sound",ra:"page_white_sound",aiff:"page_white_sound",amr:"page_white_sound",ogg:"page_white_sound","3ga":"page_white_sound",aac:"page_white_sound",oga:"page_white_sound",gif:"page_white_picture",png:"page_white_picture",jpg:"page_white_picture",jpeg:"page_white_picture",tiff:"page_white_picture",tif:"page_white_picture",bmp:"page_white_picture",odg:"page_white_picture","3fr":"page_white_picture",ari:"page_white_picture",arw:"page_white_picture",srf:"page_white_picture",sr2:"page_white_picture",bay:"page_white_picture",crw:"page_white_picture",cr2:"page_white_picture",cap:"page_white_picture",eip:"page_white_picture",dcs:"page_white_picture",dcr:"page_white_picture",drf:"page_white_picture",k25:"page_white_picture",kdc:"page_white_picture",dng:"page_white_picture",erf:"page_white_picture",fff:"page_white_picture",iiq:"page_white_picture",mef:"page_white_picture",mos:"page_white_picture",mrw:"page_white_picture",nef:"page_white_picture",nrw:"page_white_picture",orf:"page_white_picture",pef:"page_white_picture",ptx:"page_white_picture",pxn:"page_white_picture",r3d:"page_white_picture",raf:"page_white_picture",rw2:"page_white_picture",raw:"page_white_picture",rwl:"page_white_picture",rwz:"page_white_picture",obm:"page_white_picture",srw:"page_white_picture",x3f:"page_white_picture",svg:"page_white_picture",asf:"page_white_film",avi:"page_white_film",flv:"page_white_film",mov:"page_white_film",mp4:"page_white_film",mkv:"page_white_film",wmv:"page_white_film",mpg:"page_white_film","3gp":"page_white_film","3gpp":"page_white_film",m4v:"page_white_film",vob:"page_white_film",ogv:"page_white_film",gz:"page_white_compressed",tar:"page_white_compressed",rar:"page_white_compressed",zip:"page_white_compressed",tgz:"page_white_compressed",bz2:"page_white_compressed",iso:"page_white_dvd",dmg:"page_white_dvd",ai:"page_white_vector",psd:"page_white_paint",au:"page_white_sound",fla:"page_white_flash",swf:"page_white_flash",url:"page_white_linkfile",webloc:"page_white_linkfile",website:"page_white_linkfile"};_.ICON_SIZES={SMALL:"SMALL",LARGE:"LARGE",XLARGE:"XLARGE"},_.to_spectrum_icon_size=r,_.extension_icon=o,_.file_icon=d,_.new_folder_icon=c,_.spectrum_folder_icon=w,_.folder_icon=n});
//# sourceMappingURL=pkg-icon-essential.min.js-vflDGBJ0H.map