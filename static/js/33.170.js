(window.webpackJsonp=window.webpackJsonp||[]).push([[33],{"3X9x":function(t,e,i){"use strict";var n=i("25b4"),o={name:"previewFile",components:{buttonConfirm:n.a},data:function(){return{url_to_file_extension:"/static/files-extension/"+this.file.filename.split(".").pop()+".svg",url_to_file_extension_default:"/static/files-extension/file.svg"}},props:{file:{type:Object,required:!0},height:{type:String,default:"none"},onClick:{type:Function,default:function(){}},onDelete:{type:Function,default:function(){}},to_preview:{type:Boolean,default:!1},to_download:{type:Boolean,default:!1},to_delete:{type:Boolean,default:!1}},computed:{file_url:function(){return undefined.file_to_preview.url+"#toolbar=0"}},created:function(){this.file.mime.includes("image")?this.type="img":this.type="icon",this.extension=this.file.filename.split(".").pop()},methods:{deleteFile:function(){this.onDelete()},defaultFileIcon:function(t){return t.target.src=this.url_to_file_extension_default,!0},onClickFile:function(){this.onClick()},onDownloadFile:function(){window.open(this.file.url)}}},r=function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("div",{staticClass:"card p-0 preview-file"},[i("div",{staticClass:"preview-file-icon",on:{click:function(e){return t.onClickFile()}}},["img"===t.type?i("img",{staticClass:"card-img-top img-preview",style:"height:"+t.height+";",attrs:{src:t.file.url}}):i("img",{staticClass:"card-img-top p-3",style:"height:"+t.height+";",attrs:{src:t.url_to_file_extension},on:{error:t.defaultFileIcon}})]),t._v(" "),i("div",{staticClass:"card-body p-1 preview-file-info"},[i("div",{staticClass:"content-action-btn"},[!0===t.to_delete?i("buttonConfirm",{attrs:{icon:!0,style_btn:"btn btn-secondary action",refModal:"dialogBoxDelete",text:"Voulez-vous supprimer ce fichier ?",action:t.deleteFile}}):t._e()],1),t._v(" "),i("div",{staticClass:"content-action-btn"},[1==t.to_download?i("button",{staticClass:"btn btn-secondary action",on:{click:function(e){return t.onDownloadFile()}}},[i("i",{staticClass:"icon ion-ios-download"})]):t._e()]),t._v(" "),i("div",{staticClass:"card-text preview-file-filename"},[t._v(t._s(t.file.filename))])])])};r._withStripped=!0;var a=i("JFUb");var s=function(t){i("ZIXe")},c=Object(a.a)(o,r,[],!1,s,null,null);c.options.__file="src/features/common/previewFile.vue";e.a=c.exports},"6OIQ":function(t,e,i){(t.exports=i("I1BE")(!1)).push([t.i,"\n.action-button-edit[data-v-08517f6c] {\n  cursor: pointer;\n  padding: 8px 14px;\n  border-radius: 50%;\n}\n.action-button-edit[data-v-08517f6c]:hover {\n  background: #EEE;\n}\n.back-to-list[data-v-08517f6c] {\n  font-size: 2.5em;\n  cursor: pointer;\n  padding: 10px;\n  margin-right: 20px;\n}\n.bd-dashed[data-v-08517f6c] {\n  border: 2px dashed #cacaca;\n  border-radius: 2px;\n}\n.icon-group[data-v-08517f6c] {\n  color:  #1cb5a9;\n}\n.ipt-f-img[data-v-08517f6c] {\n  display: block;\n  width: 100%;\n  height: auto;\n}\n.ipt-f-box-empty[data-v-08517f6c] {\n  width: 100%;\n  height: 100%;\n  display:-webkit-inline-box;\n  display:-ms-inline-flexbox;\n  display:inline-flex;\n  -webkit-box-orient: vertical;\n  -webkit-box-direction: normal;\n      -ms-flex-direction: column;\n          flex-direction: column;     /* stack flex items vertically */\n  -webkit-box-pack: center;\n      -ms-flex-pack: center;\n          justify-content: center;    /* center items vertically, in this case */\n  -webkit-box-align: center;\n      -ms-flex-align: center;\n          align-items: center;        /* center items horizontally, in this case */\n}\n.form-horizontal[data-v-08517f6c] {\n  padding-top: 20px;\n  width: 100%;\n  max-width: 1400px;\n  margin: 0 auto;\n}\n.stats > li > span[data-v-08517f6c] {\n  font-weight: bold;\n}\n.w_parameters_preheader[data-v-08517f6c] {\n  width: 100%;\n  max-width: 1400px;\n  margin: 0 auto;\n  border: none;\n}\n.w_parameters_preheader > form.scrolled .btn-danger[data-v-08517f6c] {\n  background: white !important;\n}\n\n",""])},"6nf+":function(t,e,i){(t.exports=i("I1BE")(!1)).push([t.i,"\n.preview-file {\n  cursor:pointer;\n  border: 1px solid #ced4da !important;\n}\n.img-preview {\n  -o-object-fit: cover;\n     object-fit: cover;\n}\n.preview-file-info {\n  background-color: #292929;\n}\n.content-action-btn {\n  float: left;\n}\n.action {\n  padding: 0rem 0.5rem;\n  margin-right: 5px;\n}\n.preview-file-filename {\n  white-space: nowrap;\n  overflow: hidden;\n  text-overflow: ellipsis;\n  color: #fff;\n}\n",""])},"8D53":function(t,e,i){var n=i("DgQq");"string"==typeof n&&(n=[[t.i,n,""]]),n.locals&&(t.exports=n.locals);i("SZ7m")("44c7dd5c",n,!1,{})},Aat8:function(t,e,i){var n=i("6OIQ");"string"==typeof n&&(n=[[t.i,n,""]]),n.locals&&(t.exports=n.locals);i("SZ7m")("e9dc08d0",n,!1,{})},DgQq:function(t,e,i){(t.exports=i("I1BE")(!1)).push([t.i,"\n.no-padding[data-v-7da95bc8] {\n  padding: 0;\n}\n.ipt-f-container[data-v-7da95bc8]{\n  width: 100%;\n  padding: 5px;\n  display: inline-block;\n  overflow: hidden;\n  min-height: 120px;\n}\n.ipt-f-box[data-v-7da95bc8] {\n  border: 1px solid #c6c6c6;\n  border-radius: 2px;\n  cursor: pointer;\n  overflow: hidden;\n  width: 100%;\n  height: auto;\n  position:relative;\n  display:inline-block;\n  margin-right: 5px;\n}\n.ipt-f-box.pdf[data-v-7da95bc8] {\n  background: #ed8686;\n}\n.ipt-f-box .pdf[data-v-7da95bc8] {\n  width: 100%;\n  font-size: 20px;\n}\n.ipt-f-img[data-v-7da95bc8] {\n  display: block;\n  width: 100%;\n  height: auto;\n}\n.ipt-f-box-empty[data-v-7da95bc8] {\n  width: 100%;\n  height: 100%;\n  cursor: pointer;\n  display:-webkit-inline-box;\n  display:-ms-inline-flexbox;\n  display:inline-flex;\n  -webkit-box-orient: vertical;\n  -webkit-box-direction: normal;\n      -ms-flex-direction: column;\n          flex-direction: column;     /* stack flex items vertically */\n  -webkit-box-pack: center;\n      -ms-flex-pack: center;\n          justify-content: center;    /* center items vertically, in this case */\n  -webkit-box-align: center;\n      -ms-flex-align: center;\n          align-items: center;        /* center items horizontally, in this case */\n  position: relative;\n  padding-top:100%;\n}\n.bd-solid[data-v-7da95bc8] {\n  border: 2px solid #cacaca;\n  border-radius: 2px;\n}\n.bd-dashed[data-v-7da95bc8] {\n  border: 2px dashed #cacaca;\n  border-radius: 2px;\n}\n.btn-delete[data-v-7da95bc8] {\n  position: absolute;\n  bottom:0;\n  right:0;\n  font-size: 12px;\n  border-top-left-radius: 0px;\n  border-top-right-radius: 0px;\n  border-bottom-right-radius: 2px;\n  border-bottom-left-radius: 2px;\n}\n.btn-add[data-v-7da95bc8] {\n  max-width: 100px;\n  background-color: #cacaca;\n  border-color: #cacaca;\n}\n.btn-danger[data-v-7da95bc8] {\n  background-color: #dc3545 !important;\n}\n.file-name[data-v-7da95bc8] {\n  height: 12px;\n  font-size: 10px;\n  text-overflow: ellipsis;\n  width:100%;\n}\n.ipt-f-file[data-v-7da95bc8] {\n  padding: 5px;\n  margin: auto;\n}\n.i-f-add[data-v-7da95bc8]{\n  color: #cacaca;\n}\n.icon[data-v-7da95bc8] {\n  color: white;\n  font-size: 20px;\n  display: -webkit-box;\n  display: -ms-flexbox;\n  display: flex;\n  -webkit-box-pack: center;\n      -ms-flex-pack: center;\n          justify-content: center;\n  -webkit-box-align: center;\n      -ms-flex-align: center;\n          align-items: center;\n}\n.icon > span[data-v-7da95bc8] {\n  font-size: 20px;\n  position: absolute;\n}\n.icon-attach[data-v-7da95bc8] {\n  position:absolute;\n  top:0;\n  left:0;\n  bottom:0;\n  right:0;\n  display: -webkit-box;\n  display: -ms-flexbox;\n  display: flex;\n  -webkit-box-pack: center;\n      -ms-flex-pack: center;\n          justify-content: center;\n  -webkit-box-align: center;\n      -ms-flex-align: center;\n          align-items: center;\n}\n.native[data-v-7da95bc8] {\n  display: -webkit-box;\n  display: -ms-flexbox;\n  display: flex;\n  padding: 0 6px;\n}\n.native .icon[data-v-7da95bc8] {\n   text-decoration: line-through !important;\n   padding: 0 6px;\n   cursor: pointer;\n   color: black;\n}\n",""])},NkQ4:function(t,e,i){"use strict";i.r(e);var n=i("QbLZ"),o=i.n(n),r=i("oCYn"),a=i("L2JU"),s=i("vOup"),c=i("PaCj"),l=i("Kqdw"),d=i("s+Lo"),u=i("3X9x"),p=i("WHOg"),f={name:"ProductAdd",data:function(){return{currentTab:0,errors:{},selectedOptions:{},product:{image:{},files:[]},variantFields:[{key:"title",label:"Variante"},{key:"reference",label:"RÃ©fÃ©rence "},{key:"price_ttc",label:"Prix TTC"},{key:"sku",label:"SKU"},{key:"edit",label:"Modifier"}],variantFieldsStock:[{key:"title",label:"Variante"},{key:"reference",label:"RÃ©fÃ©rence"},{key:"stock.nb_stock",label:"QuantitÃ© en stock"},{key:"stock.nb_min",label:"Stock minimum"},{key:"stock.nb_alert",label:"Seuil d'alerte"}],turnover:{},product_stock_available:!1,product_specifications_available:!1,bus:new r.default,vatRates:[],customToolbar:[["bold","italic","underline","strike"],[{list:"ordered"},{list:"bullet"},{list:"check"}],[{size:["small",!1,"large"]}],[{color:[]},{background:[]},"link"]]}},components:{inputFileCustom:d.a,VueEditor:p.a,previewFile:u.a},computed:o()({},Object(a.b)({company:"getCompany"})),created:function(){this.mode=this.$route.params.id?"update":"create",this.regexUrl=/^(?:http(s)?:\/\/)?[\w.-]+(?:\.[\w\.-]+)+[\w\-\._~:/?#[\]@!\$&'\(\)\*\+,;=.]+$/,this.boxesNumber=3,this.$parent.$emit("updateTabs",[]),this.$parent.$emit("updateMenu",[]),this.initProduct()},methods:{editVariant:function(t){},editProduct:function(){this.$router.push({name:"ProductEdit",params:{id:this.product._id,tab:this.currentTab}})},format:function(t){return Object(s.b)(t)},initProduct:function(){var t=this;this.$store.dispatch(c.g,{id:this.$route.params.id}).then((function(e){t.product=e.data.product,(t.product.stock||t.product.hasStockManagement)&&(t.product_stock_available=!0,t.$forceUpdate()),t.product.specifications&&(t.product_specifications_available=!0),t.product.hasVariations&&t.product.options&&t.product.options.forEach((function(e){t.selectedOptions[e.name]=e.values[0]})),t.product.price_ttc=Object(s.g)(t.product.price_ht,t.product.tva_rate),t.product.price_ht=Object(s.d)(t.product.price_ttc,t.product.tva_rate)}))},onGlobalTabChange:function(t){var e=this;4!==t||this.turnover.currentYear||this.$store.dispatch(l.D,{company:this.company._id,product:this.$route.params.id}).then((function(t){e.turnover=t}))}}},b=function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("b-container",{staticClass:"container-xxl",attrs:{fluid:""}},[i("b-card",[i("div",{staticClass:"w_parameters_preheader"},[i("i",{staticClass:"icon ion-ios-arrow-round-back back-to-list",on:{click:function(e){return t.$router.push("/products")}}}),t._v(" "),i("h1",{staticClass:"title no-margin-b"},[t._v(t._s(t.product.name))]),t._v(" "),i("form",{attrs:{method:"post",id:"w_form_Update"},on:{submit:function(e){return e.preventDefault(),t.editProduct(e)}}},[i("button",{staticClass:"btn btn-default",attrs:{type:"submit"}},[t._v(t._s(t.$t("global.update")))])])]),t._v(" "),i("div",{staticClass:"form-horizontal"},[i("b-tabs",{attrs:{"content-class":"mt-3",fill:""},on:{input:t.onGlobalTabChange},model:{value:t.currentTab,callback:function(e){t.currentTab=e},expression:"currentTab"}},[i("b-tab",{attrs:{title:"GÃ©nÃ©ral"}},[i("b-row",{staticClass:"product-form"},[i("b-col",{attrs:{cols:"12",sm:"6"}},[i("b-form-group",{attrs:{label:t.$t("products.list.reference"),"label-for":"productReference"}},[i("p",{attrs:{id:"productReference"}},[t._v(t._s(t.product.reference?t.product.reference:"Aucune rÃ©ference"))])]),t._v(" "),i("b-form-group",{attrs:{label:t.$t("products.list.name"),"label-for":"productName"}},[i("p",{attrs:{id:"productName"}},[t._v(t._s(t.product.name?t.product.name:"Sans nom"))])]),t._v(" "),i("b-form-group",{attrs:{label:t.$t("products.list.category"),"label-for":"productDescription"}},[i("p",{attrs:{id:"productCategory"}},[t._v(t._s(t.product.category?t.product.category.name:"Non catÃ©gorisÃ©"))])]),t._v(" "),i("b-form-group",{attrs:{label:"Code analytique","label-for":"productCode"}},[i("p",{attrs:{id:"productCode"}},[t._v(t._s(t.product.analytical_code?t.product.analytical_code:"Sans code"))])]),t._v(" "),i("b-form-group",{attrs:{label:t.$t("products.url_ext"),"label-for":"productLink"}},[t.product.url_ext?i("p",{attrs:{id:"productLink"}},[i("a",{attrs:{href:t.product.url_ext}},[t._v(t._s(t.product.url_ext))])]):i("p",{attrs:{id:"productLink"}},[t._v("Aucun lien externe")])])],1),t._v(" "),i("b-col",{staticClass:"justify-content-start",attrs:{cols:"12",sm:"3"}},[t.product.image?i("img",{staticClass:"ipt-f-img",attrs:{src:t.product.image.url}}):i("div",{staticClass:"ipt-f-box-empty bd-dashed"},[t._v("Aucune image")])]),t._v(" "),i("b-col",{attrs:{cols:"12",sm:"12"}},[i("b-form-group",{attrs:{label:t.$t("products.list.description"),"label-for":"productDescription"}},[t.product.description?i("span",{attrs:{id:"productDescription"},domProps:{innerHTML:t._s(t.product.description)}}):i("span",{attrs:{id:"productDescription"}},[t._v("Sans description")])])],1),t._v(" "),i("b-col",{attrs:{cols:"12",sm:"4"}},[i("b-form-group",{attrs:{label:t.$t("products.list.price_ht"),"label-for":"productPriceHT"}},[i("p",{attrs:{id:"productPriceHT"}},[t._v(t._s(t.product.price_ht?t.product.price_ht:"Aucun prix"))])])],1),t._v(" "),i("b-col",{attrs:{cols:"12",sm:"4"}},[i("b-form-group",{attrs:{label:t.$t("products.list.tva_rate"),"label-for":"productTvaRate"}},[i("p",{attrs:{id:"productTvaRate"}},[t._v(t._s(t.product.tva_rate?t.product.tva_rate+"%":"0%"))])])],1),t._v(" "),i("b-col",{attrs:{cols:"12",sm:"4"}},[i("b-form-group",{attrs:{label:t.$t("products.list.price_ttc"),"label-for":"productPriceTTC"}},[i("p",{attrs:{id:"productPriceTTC"}},[t._v(t._s(t.product.price_ht?t.product.price_ttc:"Aucun prix"))])])],1),t._v(" "),i("b-col",{attrs:{cols:"12",sm:"4"}},[i("b-form-group",{attrs:{label:t.$t("products.list.buying_price"),"label-for":"productBuyingPrice"}},[i("p",{attrs:{id:"productBuyingPrice"}},[t._v(t._s(null!=t.product.buying_price?t.product.buying_price:"Aucun coÃ»t"))])])],1),t._v(" "),i("b-col",{attrs:{cols:"12",sm:"4"}},[i("b-form-group",{attrs:{label:t.$t("products.specifications.ecotax"),"label-for":"productEcotax"}},[i("p",{attrs:{id:"productEcotax"}},[t._v(t._s(t.product.ecotax?t.product.ecotax:"Aucune"))])])],1),t._v(" "),i("b-col",{attrs:{cols:"12",sm:"4"}},[i("b-form-group",{attrs:{label:t.$t("products.list.commercial_margin"),"label-for":"productCommercialMargin"}},[i("p",{attrs:{id:"productCommercialMargin"}},[t._v(t._s(t.product.commercial_margin?t.product.commercial_margin:"Non calculÃ©e"))])])],1)],1)],1),t._v(" "),t.product.variants&&t.product.hasVariations?i("b-tab",{attrs:{title:"Options des dÃ©clinaisons"}},[i("b-table",{attrs:{items:t.product.variants.filter((function(t){return t.visible})),fields:t.variantFields},scopedSlots:t._u([{key:"edit",fn:function(e){return[i("div",{staticClass:"d-flex"},[i("i",{staticClass:"action-button-edit ion-md-create",on:{click:function(){return t.editVariant(e.item)}}})])]}}],null,!1,485023940)})],1):t._e(),t._v(" "),i("b-tab",{attrs:{title:"Gestion des stocks"}},[i("div",{staticClass:"alert alert-info mt-5",attrs:{role:"alert"}},[t._v("\n            "+t._s(t.product_stock_available?"Le stock est activÃ© sur ce produit":"Le stock n'est pas activÃ© sur ce produit")+"\n          ")]),t._v(" "),t.product.stock&&!0===t.product_stock_available&&!t.product.hasVariations?i("b-row",[i("b-col",{attrs:{cols:"12",sm:"6"}},[i("b-form-group",{attrs:{label:t.$t("products.stock.nb"),"label-for":"productNbStock"}},[i("p",{attrs:{id:"productNbStock"}},[t._v(t._s(t.product.stock.nb_stock))])])],1),t._v(" "),i("b-col",{attrs:{cols:"12",sm:"6"}},[i("b-form-group",{attrs:{label:t.$t("products.stock.nb_min"),"label-for":"productNbStockMin"}},[i("p",{attrs:{id:"productNbStockMin"}},[t._v(t._s(t.product.stock.nb_min))])])],1),t._v(" "),i("b-col",{attrs:{cols:"12",sm:"6"}},[i("b-form-group",{attrs:{label:t.$t("products.stock.nb_alert"),"label-for":"productNbStockAlert"}},[i("p",{attrs:{id:"productNbStockAlert"}},[t._v(t._s(t.product.stock.nb_alert))])])],1)],1):t._e(),t._v(" "),t.product.variants&&!0===t.product_stock_available&&t.product.hasVariations?i("b-row",[i("b-col",{attrs:{cols:"12",sm:"12"}},[i("b-table",{attrs:{items:t.product.variants.filter((function(t){return t.visible})),fields:t.variantFieldsStock}})],1)],1):t._e()],1),t._v(" "),i("b-tab",{attrs:{title:"ComplÃ©mentaires"}},[i("b-row",[i("b-col",[i("div",{staticClass:"alert alert-info mt-5",attrs:{role:"alert"}},[t._v("\n              "+t._s(t.product.is_marchandise?"Ce produit est une marchandise":"Ce produit est un service")+"\n            ")])]),t._v(" "),t.product.is_marchandise?i("b-col",{attrs:{cols:"6"}},[i("div",{staticClass:"alert alert-info mt-5",attrs:{role:"alert"}},[t._v("\n              "+t._s(t.product_specifications_available?"Ce produit est physique":"Ce produit est dÃ©matÃ©rialisÃ©")+"\n            ")])]):i("b-col",[i("div",{staticClass:"alert alert-info mt-5",attrs:{role:"alert"}},[t._v("\n              "+t._s(t.product.electronic?"Electronique":"Cas gÃ©nÃ©ral")+"\n            ")])])],1),t._v(" "),t.product_specifications_available?i("b-row",[i("b-col",{attrs:{cols:"12",sm:"6"}},[i("b-form-group",{attrs:{label:t.$t("products.specifications.width"),"label-for":"productWidth"}},[i("p",{attrs:{id:"productWidth"}},[t._v(t._s(t.product.specifications.width?t.product.specifications.width+" cm":"Information manquante"))])])],1),t._v(" "),i("b-col",{attrs:{cols:"12",sm:"6"}},[i("b-form-group",{attrs:{label:t.$t("products.specifications.height"),"label-for":"productHeight"}},[i("p",{attrs:{id:"productHeight"}},[t._v(t._s(t.product.specifications.height?t.product.specifications.height+" cm":"Information manquante"))])])],1),t._v(" "),i("b-col",{attrs:{cols:"12",sm:"6"}},[i("b-form-group",{attrs:{label:t.$t("products.specifications.depth"),"label-for":"productDepth"}},[i("p",{attrs:{id:"productDepth"}},[t._v(t._s(t.product.specifications.depth?t.product.specifications.depth+" cm":"Information manquante"))])])],1),t._v(" "),i("b-col",{attrs:{cols:"12",sm:"6"}},[i("b-form-group",{attrs:{label:t.$t("products.specifications.weight"),"label-for":"productWeight"}},[i("p",{attrs:{id:"productWeight"}},[t._v(t._s(t.product.specifications.weight?t.product.specifications.weight+" g":"Information manquante"))])])],1)],1):t._e()],1),t._v(" "),t.product.mandatory_mentions?i("b-tab",{attrs:{title:"Mentions obligatoires"}},[i("b-row",[i("b-col",{attrs:{cols:"12",sm:"12"}},[i("b-form-group",{attrs:{label:"Mentions obligatoires","label-for":"productFiles"}},[i("b-row",[i("b-col",{domProps:{innerHTML:t._s(t.product.mandatory_mentions)}})],1)],1)],1)],1)],1):t._e(),t._v(" "),i("b-tab",{attrs:{title:"Fichiers joints"}},[i("b-row",[i("b-col",{attrs:{cols:"12",sm:"12"}},[i("b-form-group",{attrs:{label:t.$t("products.files"),"label-for":"productFiles"}},[i("b-row",t._l(t.product.files,(function(t){return i("b-col",{attrs:{cols:"6",sm:"3"}},[i("preview-file",{attrs:{file:t,to_download:!0,height:"110px"}})],1)})),1)],1)],1)],1)],1),t._v(" "),i("b-tab",{attrs:{title:"Statistiques"}},[i("h5",[i("i",{staticClass:"icon ion-ios-stats icon-group"}),t._v(" Statistiques")]),t._v(" "),i("ul",{staticClass:"list-group stats"},[t.turnover.lastYear?i("li",{staticClass:"list-group-item"},[t._v("Chiffre d'affaires HT de l'exercice prÃ©cÃ©dent : "),i("span",[t._v(t._s(t.format(t.turnover.lastYear.total_ht)))]),t._v(" ("+t._s(t.turnover.lastYear.number)+")")]):t._e(),t._v(" "),t.turnover.currentYear?i("li",{staticClass:"list-group-item"},[t._v("Chiffre d'affaires HT de l'exercice en cours : "),i("span",[t._v(t._s(t.format(t.turnover.currentYear.total_ht)))]),t._v(" ("+t._s(t.turnover.currentYear.number)+")")]):t._e(),t._v(" "),t.turnover.lastMonth?i("li",{staticClass:"list-group-item"},[t._v("Chiffre d'affaires HT du mois dernier : "),i("span",[t._v(t._s(t.format(t.turnover.lastMonth.total_ht)))]),t._v(" ("+t._s(t.turnover.lastMonth.number)+")")]):t._e(),t._v(" "),t.turnover.currentMonth?i("li",{staticClass:"list-group-item"},[t._v("Chiffre d'affaires HT du mois en cours : "),i("span",[t._v(t._s(t.format(t.turnover.currentMonth.total_ht)))]),t._v(" ("+t._s(t.turnover.currentMonth.number)+")")]):t._e()])])],1)],1)])],1)};b._withStripped=!0;var v=i("JFUb");var m=function(t){i("Aat8")},_=Object(v.a)(f,b,[],!1,m,"data-v-08517f6c",null);_.options.__file="src/features/products/ProductShow.vue";e.default=_.exports},ZIXe:function(t,e,i){var n=i("6nf+");"string"==typeof n&&(n=[[t.i,n,""]]),n.locals&&(t.exports=n.locals);i("SZ7m")("610b724d",n,!1,{})},"s+Lo":function(t,e,i){"use strict";var n=i("rfXi"),o=i.n(n),r=i("QbLZ"),a=i.n(r),s=i("L2JU"),c=i("1LJ2"),l=(i("//bJ"),{components:{previewFile:i("3X9x").a},data:function(){return{idx:-1,new_file:this.file,new_files:this.files,file_loading:!1,files_loading:[],loading:!1}},props:{native:{type:Boolean,default:!1},type:{type:String,default:"single"},limit:{type:Number,default:1},files:{type:Array},file:{type:Object},data:{type:String,default:"emstorage"},bus:{type:Object,required:!0},busName:{type:String,default:"new_file"},width:{type:String,default:"none"},height:{type:String,default:"none"},accept:{type:String,default:""}},computed:a()({},Object(s.b)({company:"getCompany"}),{myBoxDimensions:function(){return{height:this.height,width:this.width}},myContenerDimensions:function(){return{}}}),created:function(){if(this.files)for(var t=0;t<this.limit;t++)this.files_loading[t]=!1},methods:{searchFile:function(t){this.idx=t,this.$refs.inputFile.click()},addFile:function(t,e){var i=this;this.loading=!0;var n=new FormData;if(e.length){o()(Array(e.length).keys()).map((function(i){n.append(t,e[i],e[i].name)}));var r=this.company;"alone"===this.idx||"depot"===this.type?this.file_loading=!0:(this.files_loading[this.idx]=!0,this.$forceUpdate()),this.$store.dispatch(c.b,{object:n,company:r}).then((function(t){if("alone"!==i.idx&&i.files){var e=i.files;e[i.idx]?e[i.idx]=t:e.push(t),"depot"===i.type?i.file_loading=!1:i.files_loading[i.idx]=!1,i.native&&(i.file=e[0]),i.bus.$emit(i.busName,e),i.$forceUpdate()}else{var n=t;i.file_loading=!1,i.bus.$emit(i.busName,n)}})).catch((function(t){"alone"===i.idx?i.file_loading=!1:i.files_loading[i.idx]=!1,i.$forceUpdate()}))}},deleteFile:function(t){if("alone"===t)this.bus.$emit(this.busName,{});else{var e=this.files;e.splice(t,1),this.bus.$emit(this.busName,e)}this.$refs.inputFile.value=null,this.$forceUpdate()},iconFile:function(t){var e=t.mime||"";return e.indexOf("pdf")>-1?"PDF":e.indexOf("docx")>-1?"DOC":e.indexOf("audio")>-1?"AUDIO":e.indexOf("video")>-1?"VIDEO":""}}}),d=function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("div",[t.native?t._e():i("div",[i("input",{ref:"inputFile",staticStyle:{display:"none"},attrs:{id:"inputFile",name:"file",type:"file",accept:t.accept},on:{change:function(e){return t.addFile(e.target.name,e.target.files)}}}),t._v(" "),t.file?i("div",{ref:"new_file",staticClass:"ipt-f-container ipt-f-alone",style:t.myBoxDimensions},[t.file.url&&!t.file_loading?i("div",[i("preview-file",{attrs:{file:t.file,to_download:!0,to_delete:!0,onDelete:function(e){return t.deleteFile("alone")},onClick:function(e){return t.searchFile("alone")}}})],1):i("div",{staticClass:"ipt-f-box-empty bd-dashed",on:{click:function(e){return t.searchFile("alone")}}},[i("span",{staticClass:"icon-attach"},[i("ion-icon",{staticStyle:{"font-size":"20px"},attrs:{name:"attach-outline"}}),t._v(" "),t.file_loading?i("loading",{staticClass:"loading-center",attrs:{color:"#56b2ac"}}):t._e()],1)])]):t._e(),t._v(" "),t._l(t.limit,(function(e,n){return t.files&&"depot"!=t.type?i("div",{staticClass:"ipt-f-container",style:t.myBoxDimensions},[t.files[n]&&!1===t.files_loading[n]?i("div",[i("preview-file",{attrs:{file:t.files[n],to_download:!0,to_delete:!0,height:"110px",onDelete:function(e){return t.deleteFile(n)},onClick:function(e){return t.searchFile(n)}}})],1):i("div",{staticClass:"ipt-f-box ipt-f-box-empty bd-dashed ",on:{click:function(e){return t.searchFile(n)}}},[t.files_loading[n]?i("loading",{attrs:{color:"#56b2ac"}}):t._e()],1)]):t._e()})),t._v(" "),t.files&&"depot"===t.type?i("div",{staticClass:"ipt-f-container bd-dashed",style:t.myContenerDimensions},[i("b-row",t._l(t.files,(function(e,n){return e?i("b-col",{attrs:{cols:"6",sm:"3"}},[i("preview-file",{attrs:{file:e,to_download:!0,to_delete:!0,height:"110px",onDelete:function(e){return t.deleteFile(n)}}})],1):t._e()})),1)],1):t._e()],2),t._v(" "),t.files&&"depot"===t.type?i("button",{staticClass:"btn btn-block btn-primary btn-add",attrs:{type:"button"},on:{click:function(e){return t.searchFile(t.files.length)}}},[t.file_loading?t._e():i("i",{staticClass:"icon ion-ios-add"}),t._v(" "),t.file_loading?i("loading",{attrs:{color:"#56b2ac",size:"16px"}}):t._e()],1):t._e(),t._v(" "),t.native?i("div",{staticClass:"margin-t native"},[t.loading?i("loading",{attrs:{color:"#56b2ac",size:"16px"}}):t._e(),t._v(" "),t.file.url?t._e():i("input",{ref:"inputFile",attrs:{name:"file",type:"file",accept:t.accept},on:{change:function(e){return t.addFile(e.target.name,e.target.files)}}}),t._v(" "),t.file.url?i("div",{staticClass:"flex"},[i("a",{attrs:{href:t.file.url}},[t._v("..."+t._s(t.file.url.slice(-40)))]),t._v(" "),i("i",{directives:[{name:"tooltip",rawName:"v-tooltip",value:"Supprimer la piÃ¨ce jointe",expression:"'Supprimer la piÃ¨ce jointe'"}],staticClass:"icon ion-ios-attach striked",on:{click:function(e){return t.deleteFile("alone")}}})]):t._e()],1):t._e()])};d._withStripped=!0;var u=i("JFUb");var p=function(t){i("8D53")},f=Object(u.a)(l,d,[],!1,p,"data-v-7da95bc8",null);f.options.__file="src/features/common/inputFileCustom.vue";e.a=f.exports},vOup:function(t,e,i){"use strict";i.d(e,"f",(function(){return o})),i.d(e,"j",(function(){return r})),i.d(e,"i",(function(){return a})),i.d(e,"h",(function(){return s})),i.d(e,"k",(function(){return c})),i.d(e,"c",(function(){return l})),i.d(e,"d",(function(){return d})),i.d(e,"g",(function(){return u})),i.d(e,"e",(function(){return p})),i.d(e,"b",(function(){return f})),i.d(e,"a",(function(){return b}));var n=i("Yvet"),o=function(t,e){return t&&t.length?t.reduce((function(t,i){return t+parseFloat(i[e]||0)}),0):0},r=function(t){return o(t,"total_ht_no_discount")},a=function(t){return o(t,"total_ht")},s=function(t){return o(t,"total_discount")},c=function(t){var e=arguments.length>1&&void 0!==arguments[1]?arguments[1]:0,i=arguments.length>2&&void 0!==arguments[2]?arguments[2]:0,n=arguments.length>3&&void 0!==arguments[3]?arguments[3]:0,r=u(parseFloat(e),parseFloat(i)),a=o(t,"price_ttc")*(1-n/100);return a+r},l=function(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:0,e=arguments.length>1&&void 0!==arguments[1]?arguments[1]:0,i=arguments.length>2&&void 0!==arguments[2]?arguments[2]:"â‚¬",n=arguments.length>3&&void 0!==arguments[3]&&arguments[3],o=parseFloat(e);if("%"===i){var r=void 0;return n&&(r=parseFloat(100-o)/100),n?Math.abs(t-t/r):t*o/100}return 100*o},d=function(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:0,e=arguments.length>1&&void 0!==arguments[1]?arguments[1]:0,i=arguments.length>2&&void 0!==arguments[2]?arguments[2]:1,n=arguments.length>3&&void 0!==arguments[3]?arguments[3]:0,o=arguments.length>4&&void 0!==arguments[4]?arguments[4]:"â‚¬",r=100*parseFloat(t),a=l(r,parseFloat(n),o,!0),s=void 0;s=a&&!isNaN(a)&&n>0?(r+a)/i:r/i;var c=1+parseFloat(e)/100;return Math.round(s/c)/100},u=function(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:0,e=arguments.length>1&&void 0!==arguments[1]?arguments[1]:0,i=arguments.length>2&&void 0!==arguments[2]?arguments[2]:1,n=arguments.length>3&&void 0!==arguments[3]?arguments[3]:0,o=arguments.length>4&&void 0!==arguments[4]?arguments[4]:"â‚¬",r=100*parseFloat(t),a=l(r,parseFloat(n),o),s=void 0;s=a&&!isNaN(a)&&n>0?(r-a)*i:r*i;var c=1+parseFloat(e)/100;return Math.round(s*c)/100},p=function(t,e){var i=arguments.length>2&&void 0!==arguments[2]?arguments[2]:0,n=arguments.length>3&&void 0!==arguments[3]?arguments[3]:"â‚¬",o=100*parseFloat(t),r=l(o,parseFloat(i),n),a=(o-r)*e;return Math.round(a)/100},f=function(t){var e=arguments.length>1&&void 0!==arguments[1]?arguments[1]:"fr-FR",i=arguments.length>2&&void 0!==arguments[2]?arguments[2]:"EUR";return Object(n.d)(Math.round(100*t)/100,e,i)},b=function(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:0;return(Math.round(100*t)/100/1+"").replace(".",",")}}}]);