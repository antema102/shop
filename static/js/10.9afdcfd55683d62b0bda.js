(window.webpackJsonp=window.webpackJsonp||[]).push([[10],{"3BYd":function(e,n,t){"use strict";var a=t("14Xm"),r=t.n(a),i=t("D3Ub"),s=t.n(i),o=t("0zfQ"),c=t("wd/R"),l=t.n(c),u={name:"TeamMember",data:function(){return{isHere:!1,ampm:" ce matin",tooltip:"",userBirthday:!1}},created:function(){var e=this;return s()(r.a.mark((function n(){var t,a,i;return r.a.wrap((function(n){for(;;)switch(n.prev=n.next){case 0:return t=new Date,a=t.getHours(),e.ampm=a>12?" cet après-midi":" ce matin",e.user.birthdate&&(e.userBirthday=e.isBirthDay(t,l()(e.user.birthdate).toDate()),e.userBirthday&&(e.tooltip="C'est l'anniversaire de "+e.user.first_name+"<br />")),n.next=6,e.$store.dispatch(o.a,{user:e.user._id,company:e.company,today:!0,state:"accepted"});case 6:i=n.sent,e.isHere=i&&0===i.length,e.user.mainPosition.isSalaried&&"inactive"!==e.user.mainPosition.state&&(e.tooltip+=e.user.first_name,e.absenceRight&&(e.isHere?e.tooltip+=" est présent":e.tooltip+=" est absent",e.tooltip+=e.user.gender?"F"===e.user.gender?"e":"H"===e.user.gender?"":"(e)":"(e)"));case 9:case"end":return n.stop()}}),n,e)})))()},props:{user:{type:Object,default:function(){}},company:{type:String,default:null},absenceRight:{type:Boolean,default:!1},selectUser:{type:Function,default:function(){}},classList:{type:String,default:"col-6 col-lg-4 col-xl-3 mb-3"}},methods:{isBirthDay:function(e,n){return e.getDate()+"/"+e.getMonth()==n.getDate()+"/"+n.getMonth()}}},p=function(){var e=this,n=e.$createElement,a=e._self._c||n;return a("div",{staticClass:"team-member",class:e.classList,on:{click:function(){return e.selectUser(e.user)}}},[a("div",{directives:[{name:"tooltip",rawName:"v-tooltip",value:e.tooltip,expression:"tooltip"}],staticClass:"user row",class:{birthday:e.userBirthday}},[a("div",{staticClass:"col col-picture"},[a("div",{staticStyle:{width:"45px",position:"relative"}},[a("p",{staticClass:"avatar-container mt-auto mb-auto rounded-circle",staticStyle:{height:"45px",width:"45px"}},[e.user.avatar?a("img",{staticClass:"user-avatar img-fluid",attrs:{src:e.user.avatar}}):a("img",{staticClass:"user-avatar img-fluid",attrs:{src:t("SDto")}})]),e._v(" "),e.absenceRight&&e.user.mainPosition&&e.user.mainPosition.isSalaried?a("span",{staticClass:"absence",class:{here:!0===e.isHere}}):e._e()])]),e._v(" "),a("div",{staticClass:"col col-description flex-column details overellipse"},[a("p",{staticClass:"user-name"},[e._v(e._s(e.user.first_name)+" "+e._s(e.user.last_name))]),e._v(" "),e.user.mainPosition?a("p",{staticClass:"user-description mb-0 overellipse"},[e._v(e._s(e.user.mainPosition.name))]):e._e()])])])};p._withStripped=!0;var d=t("JFUb");var m=function(e){t("MAXm")},f=Object(d.a)(u,p,[],!1,m,"data-v-7b8b00a2",null);f.options.__file="src/features/common/team-member.vue";n.a=f.exports},"BMc/":function(e,n,t){(e.exports=t("I1BE")(!1)).push([e.i,'\n.user.birthday[data-v-7b8b00a2]::before {\n  background: url(/static/gateau-bougie.svg) no-repeat;\n  content: "";\n  background-size: contain;\n  width: 40px;\n  position: absolute;\n  bottom: 0px;\n  z-index: 8;\n  height: 40px;\n}\n.user.birthday[data-v-7b8b00a2] {\n  background: url(/static/confettis-bg.svg) no-repeat;\n  background-size: cover;\n}\n.user-profile > .user[data-v-7b8b00a2] {\n  display: -webkit-box;\n  display: -ms-flexbox;\n  display: flex;\n  -webkit-box-align: center;\n      -ms-flex-align: center;\n          align-items: center;\n  margin: 0;\n  margin-bottom: 8px;\n}\n.user h2.position[data-v-7b8b00a2] {\n  font-size: 13px !important;\n  color: #888;\n  margin-top: 0.35rem;\n  max-width: 100%;\n  white-space: nowrap;\n  text-overflow: ellipsis;\n  overflow: hidden;\n}\n.user h2 .icon[data-v-7b8b00a2] {\n  width: 17px;\n  display: inline-block;\n  text-align: center;\n  font-size: 13px;\n  margin-right: 4px;\n  vertical-align: middle;\n}\n\n\n\n',""])},MAXm:function(e,n,t){var a=t("BMc/");"string"==typeof a&&(a=[[e.i,a,""]]),a.locals&&(e.exports=a.locals);t("SZ7m")("54fe70be",a,!1,{})},lcx2:function(e,n,t){"use strict";var a=t("14Xm"),r=t.n(a),i=t("D3Ub"),s=t.n(i),o=t("QbLZ"),c=t.n(o),l=t("L2JU"),u=t("wXDQ"),p=(t("3BYd"),t("wd/R")),d=t.n(p),m=t("7m4s"),f=t.n(m),v=t("dPTf"),b=t("8l+Y"),x={name:"Offer",props:{currentVersion:{type:Object,default:function(){}},onlyQuota:{type:Boolean,default:!1}},components:{"k-progress":f.a},data:function(){return{moment:d.a,currentOrder:{},mailsSent:0,storageTotalUsed:0,companyRight:!1,value:40,progressValues:{companyFillPercentage:0,invoiceUsed:0,storage:0,email:0},options:{text:{shadowEnable:!1,hideText:!0},progress:{color:"#28ccbf",backgroundColor:"#dee2e6"},layout:{fontSize:"0px",hideText:!0,type:"line",width:204,height:5,strokeWidth:5,progressPadding:0}},optionsFullWidth:{text:{shadowEnable:!1,hideText:!0},progress:{color:"#28ccbf",backgroundColor:"#dee2e6"},layout:{fontSize:"0px",hideText:!0,type:"line",width:264,height:5,strokeWidth:5,progressPadding:0}}}},mounted:function(){this.init()},watch:{companyStatus:function(e,n){"idle"===e&&this.init()}},computed:c()({},Object(l.b)({user:"getProfile",company:"getCompany",companyStatus:"getCompanyStatus"})),methods:{goTo:function(e){this.$router.push(e)},formatBytesToMB:function(e){return(e>>>20)+"."+(2046&e)},formatBytes:function(e){var n=arguments.length>1&&void 0!==arguments[1]?arguments[1]:2;if(0===e)return"0";var t=0>n?0:n,a=Math.floor(Math.log(e)/Math.log(1024));return parseFloat((e/Math.pow(1024,a)).toFixed(t))+" "+["Bytes","KB","MB","GB","TB","PB","EB","ZB","YB"][a]},formatBytesNumber:function(e){var n=arguments.length>1&&void 0!==arguments[1]?arguments[1]:2;if(0===e)return 0;var t=0>n?0:n,a=Math.floor(Math.log(e)/Math.log(1024));return Number(parseFloat((e/Math.pow(1024,a)).toFixed(t)))},init:function(){var e,n=this;if(this.company){var t=this.company.fillPercentage||100;isNaN(t)||(this.progressValues.companyFillPercentage=Number(t)),this.loadStats(),this.$store.dispatch(b.v,{company_id:this.company._id}).then((e=s()(r.a.mark((function e(t){var a;return r.a.wrap((function(e){for(;;)switch(e.prev=e.next){case 0:n.mailsSent=Number(t),a=n.mailsSent/n.currentVersion.emails_max*100,isNaN(a)||(n.progressValues.email=Number()),n.mailsSent>n.currentVersion.emails_max&&n.$notify({group:"alert",type:"error",title:"Quota d'emails dépassé",text:"Vous devrez prendre un abonnement supérieur ou attendre le mois prochain pour envoyer de nouveaux mails"});case 4:case"end":return e.stop()}}),e,n)}))),function(n){return e.apply(this,arguments)})),this.companyRight=Object(u.b)(this.user.mainPosition.rights,"manageCompany",this.user.mainPosition),this.currentOrder.nextRenew=d()().add(1,"M").startOf("month").format("DD/MM/YYYY"),this.$store.dispatch(v.b,{company_id:this.company._id}).then((function(e){if(e){n.currentOrder=e,n.currentOrder.nextRenew=n.getNextRenew(n.currentOrder.payment_date);var t=(n.currentVersion.allowed_invoices_nb-n.company.invoices_left)/n.currentVersion.allowed_invoices_nb*100;isNaN(t)||(n.progressValues.invoiceUsed=Number(t)),n.$forceUpdate()}}))}},getNextRenew:function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{},n=d()(e).format("DD")+d()().format("/MM/YYYY");return e&&(n=d()().isAfter(d()(n,"DD/MM/YYYY"))?d()(e).format("DD")+d()().add(1,"M").format("/MM/YYYY"):d()(e).format("DD")+d()().format("/MM/YYYY")),n},loadStats:function(){var e=this;return s()(r.a.mark((function n(){var t,a,i;return r.a.wrap((function(n){for(;;)switch(n.prev=n.next){case 0:if(n.prev=0,!e.company){n.next=12;break}return n.next=4,e.$store.dispatch(b.u,e.company.container_id);case 4:return t=n.sent.size,n.next=7,e.$store.dispatch(b.u,e.company.private_container_id);case 7:a=n.sent.size,e.storageTotalUsed=Number(t+a),i=e.storageTotalUsed/e.currentVersion.storage_max*100,isNaN(i)||(e.progressValues.storage=Number(i)),e.storageTotalUsed>e.currentVersion.storage_max&&e.$notify({group:"alert",type:"error",title:"Quota de fichiers dépassé",text:"Vous devrez prendre un abonnement supérieur pour mettre en ligne de nouveaux fichiers sur Wuro"});case 12:n.next=16;break;case 14:n.prev=14,n.t0=n.catch(0);case 16:case"end":return n.stop()}}),n,e,[[0,14]])})))()}}},h=function(){var e=this,n=e.$createElement,t=e._self._c||n;return e.company?t("div",{staticClass:"offer card",class:{"two-columns":e.onlyQuota}},[e.onlyQuota?e._e():t("div",{staticClass:"company"},[e.company.logo?t("img",{staticClass:"company-logo",attrs:{src:e.company.logo,width:"80"}}):e._e(),e._v(" "),t("div",{staticClass:"name-block column-flex align-items-center"},[t("h2",{staticClass:"company-name black-subtitle"},[e._v("\n        "+e._s(e.company.name)+"\n      ")]),e._v(" "),t("a",{staticClass:"wuro-link",on:{click:function(n){return e.$router.push("params")}}},[e._v("Modifier les paramètres")]),e._v(" "),t("div",{staticClass:"percentage align-self-end"},[t("k-progress",{attrs:{percent:e.progressValues.companyFillPercentage,"show-text":!1,color:"#61c8d0"}})],1)])]),e._v(" "),e.companyRight?t("div",{staticClass:"box-version",on:{click:function(n){return e.goTo({name:"Subscription"})}}},[t("h2",{staticClass:"current-offer black-subtitle"},[e._v("\n      Mon offre actuelle :\n    ")]),e._v(" "),t("div",{staticClass:"current-version"},[e.currentVersion.img?t("img",{staticClass:"current-version-avatar",attrs:{alt:e.currentVersion.description,src:e.currentVersion.img}}):e._e(),e._v(" "),t("div",{staticClass:"details"},[t("h1",[e._v(e._s(e.$t("version."+e.currentVersion.name)))]),e._v(" "),"colibri"!==e.currentVersion.name&&e.currentOrder&&!e.currentOrder.recurrent?t("h2",{staticClass:"position"},[e._v("Votre abonnement se termine le "+e._s(e.moment(e.currentOrder.payment_date).add(e.currentOrder.nb_month,"months").format("DD/MM/YYYY")))]):e._e()]),e._v(" "),t("h2",{staticClass:"resources"},[e._v("Vos ressources du mois, jusqu'au "+e._s(e.currentOrder.nextRenew))]),e._v(" "),t("div",{staticClass:"label"},[t("h3",[e._v(e._s(e.currentVersion.allowed_invoices_nb-e.company.invoices_left)+" Factures utilisées")]),e._v(" "),t("span",{staticClass:"stats"},[t("span",[e._v(e._s(e.currentVersion.allowed_invoices_nb-e.company.invoices_left))]),e._v("/"+e._s(e.currentVersion.allowed_invoices_nb))])]),e._v(" "),t("k-progress",{attrs:{percent:e.progressValues.invoiceUsed,"show-text":!1,color:"#61c8d0"}}),e._v(" "),t("div",{staticClass:"label"},[t("h3",[e._v("E-mails")]),e._v(" "),t("span",{staticClass:"stats"},[t("span",[e._v(e._s(e.mailsSent))]),e._v("/"+e._s(e.currentVersion.emails_max))])]),e._v(" "),t("k-progress",{attrs:{percent:e.progressValues.email,"show-text":!1,color:"#61c8d0"}})],1)]):e._e(),e._v(" "),t("div",{staticClass:"current-version-after"},[t("div",{staticClass:"label"},[t("h3",[e._v("Espace de stockage")]),e._v(" "),t("span",{staticClass:"stats"},[t("span",[e._v(e._s(e.formatBytes(e.storageTotalUsed)))]),e._v("/"+e._s(e.formatBytes(e.currentVersion.storage_max)))])]),e._v(" "),t("k-progress",{attrs:{percent:e.progressValues.storage,"show-text":!1,color:"#61c8d0"}}),e._v(" "),t("a",{staticClass:"wuro-link margin-t",on:{click:function(n){return e.$router.push("help")}}},[e._v("Augmenter mon espace de stockage")]),e._v(" "),e.onlyQuota?t("button",{staticClass:"btn btn-default btn-primary special-color margin-t",on:{click:function(n){return e.$router.push("subscription/quota")}}},[e._v("\n      Voir le détail\n    ")]):e._e()],1),e._v(" "),e.onlyQuota?e._e():[t("h2",{staticClass:"current-offer black-subtitle"},[e._v("\n      Offrez le meilleur à votre entreprise\n    ")]),e._v(" "),t("p",{staticClass:"subscribe"},[e._v("En souscrivant à une offre supérieure vous augmenterez le nombre de factures que vous pouvez réaliser par mois")]),e._v(" "),t("button",{staticClass:"btn btn-default btn-primary special-color",on:{click:function(n){return e.$router.push("subscription")}}},[e._v("\n      "+e._s("colibri"===e.currentVersion.name?"Souscrire une ":"Gérer mon ")+" offre\n    ")])]],2):e._e()};h._withStripped=!0;var g=t("JFUb");var w=function(e){t("t5Nx")},_=Object(g.a)(x,h,[],!1,w,"data-v-0609a27e",null);_.options.__file="src/features/common/offer.vue";n.a=_.exports},t5Nx:function(e,n,t){var a=t("tJM4");"string"==typeof a&&(a=[[e.i,a,""]]),a.locals&&(e.exports=a.locals);t("SZ7m")("46f1446d",a,!1,{})},tJM4:function(e,n,t){(e.exports=t("I1BE")(!1)).push([e.i,"\n.company[data-v-0609a27e] {\n  display: -webkit-box;\n  display: -ms-flexbox;\n  display: flex;\n  min-height: 73px;\n}\n\n/*.name-block {\ndisplay: flex;\nflex-wrap: wrap;\n}*/\n.company .name-block div.percentage[data-v-0609a27e] {\n  width: 100%;\n  margin-top: 11px;\n}\n.current-offer[data-v-0609a27e] {\n  font-size: 16px;\n}\n.company-logo[data-v-0609a27e] {\n  width: auto;\n  max-width: 80px;\n  margin-right: 11px;\n  height: -webkit-fit-content;\n  height: -moz-fit-content;\n  height: fit-content;\n  max-height: 67px;\n}\n.card[data-v-0609a27e] {\n  position: relative;\n  display: -webkit-box;\n  display: -ms-flexbox;\n  display: flex;\n  -webkit-box-orient: vertical;\n  -webkit-box-direction: normal;\n      -ms-flex-direction: column;\n          flex-direction: column;\n  min-width: 0;\n  word-wrap: break-word;\n  background: #fff!important;\n  background-clip: border-box;\n  border: 1px solid rgba(0,0,0,.125);\n  border-radius: .25rem;\n  border: none!important;\n  padding: 20px 30px;\n  border-radius: 30px!important;\n  min-height: 130px;\n  margin-bottom: 20px;\n  -webkit-box-shadow: var(--shadow);\n}\n.box-version[data-v-0609a27e] {\n  padding: 14px;\n  background: #eff7fb;\n  width: auto;\n  border: none;\n  -webkit-box-shadow: none;\n          box-shadow: none;\n  margin-top: 25px;\n}\n.img-version img[data-v-0609a27e] {\n  padding: 0;\n}\n.current-version[data-v-0609a27e] {\n  position: relative;\n  display: inline-block;\n  width: 100%;\n  min-width: 176px;\n  max-width: 100%;\n  margin: 8px 8px 0 0;\n}\n.current-version h3[data-v-0609a27e], .current-version-after h3[data-v-0609a27e] {\n  text-transform: uppercase;\n  font-size: 11px;\n  color: #999;\n  padding: 0;\n  margin: 0;\n}\n.current-version .label[data-v-0609a27e], .current-version-after .label[data-v-0609a27e] {\n  display: -webkit-box;\n  display: -ms-flexbox;\n  display: flex;\n  -webkit-box-pack: justify;\n      -ms-flex-pack: justify;\n          justify-content: space-between;\n  -webkit-box-align: center;\n      -ms-flex-align: center;\n          align-items: center;\n  font-size: 11px;\n  margin: 9px 0 3px 0;\n  color: #999;\n}\n.current-version .label > span.stats > span[data-v-0609a27e], .current-version-after .label > span.stats > span[data-v-0609a27e]  {\n  color: #61c8d0;\n}\n.current-version .current-version-avatar[data-v-0609a27e] {\n  float: left;\n  max-width: 25%;\n  width: 50px;\n  padding: 5px;\n  margin-right: 5px;\n  border-radius: 50%;\n}\n.current-version-profile > .current-version[data-v-0609a27e] {\n  display: -webkit-box;\n  display: -ms-flexbox;\n  display: flex;\n  -webkit-box-align: center;\n      -ms-flex-align: center;\n          align-items: center;\n  margin: 0;\n  margin-bottom: 8px;\n}\n.current-version-profile .current-version-avatar[data-v-0609a27e] {\n  max-width: none;\n  width: 76px;\n  padding: 5px 5px 5px 0;\n}\n.current-version h1[data-v-0609a27e], .resources[data-v-0609a27e] {\n  margin: 0;\n  padding: 2px;\n  font-size: 15px !important;\n  max-width: 100%;\n  white-space: nowrap;\n  text-overflow: ellipsis;\n  overflow: hidden;\n  color: #333;\n}\n.current-version-after[data-v-0609a27e] {\n  padding: 14px;\n}\n.resources[data-v-0609a27e] {\n  margin-top: 15px;\n  text-transform: uppercase;\n  font-size: 11px!important;\n}\n.current-version h2.position[data-v-0609a27e] {\n  font-size: 12px !important;\n  color: #888;\n  margin-top: 0.15rem;\n}\n.current-version h2 .icon[data-v-0609a27e] {\n  width: 17px;\n  display: inline-block;\n  text-align: center;\n  font-size: 13px;\n  margin-right: 4px;\n  vertical-align: middle;\n}\n.wuro-link[data-v-0609a27e] {\n  display: block;\n}\n.offer p.subscribe[data-v-0609a27e] {\n  margin-top: 5px;\n  color: #999;\n  font-size: 0.9em;\n}\n.offer.two-columns[data-v-0609a27e] {\n  border: none!important;\n  padding: 0;\n  -webkit-box-shadow: none;\n          box-shadow: none;\n  display: -webkit-box;\n  display: -ms-flexbox;\n  display: flex;\n  width: 100%;\n  max-width: 1000px;\n  -webkit-box-orient: horizontal;\n  -webkit-box-direction: normal;\n      -ms-flex-direction: row;\n          flex-direction: row;\n}\n.offer.two-columns .box-version[data-v-0609a27e] {\n  -webkit-box-flex: 50%;\n      -ms-flex: 50%;\n          flex: 50%;\n  margin-top: 0;\n}\n.offer.two-columns .current-version-after[data-v-0609a27e] {\n  -webkit-box-flex: 50%;\n      -ms-flex: 50%;\n          flex: 50%;\n}\n@media only screen and (max-width: 1268px) {\n.offer.two-columns[data-v-0609a27e] {\n    -webkit-box-orient: vertical;\n    -webkit-box-direction: normal;\n        -ms-flex-direction: column;\n            flex-direction: column;\n    max-width: none;\n}\n.offer.two-columns .box-version[data-v-0609a27e] {\n    -webkit-box-flex: 100%;\n        -ms-flex: 100%;\n            flex: 100%;\n}\n.offer.two-columns .current-version-after[data-v-0609a27e] {\n    -webkit-box-flex: 100%;\n        -ms-flex: 100%;\n            flex: 100%;\n}\n}\n",""])}}]);