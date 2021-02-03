define([
    'underscore',
    'uiRegistry',
    'Magento_Ui/js/form/element/select',
    'Magento_Ui/js/modal/modal'
], function (_, uiRegistry, select, modal) {
    'use strict';
    return select.extend({
        initialize: function () {
            this._super();
            this.fieldDepend(this.value());
            return this;
        },

        /**
         * On value change handler.
         *
         * @param {String} value
        */

        onUpdate: function (value) {
            var field1 = uiRegistry.get('index = link');
            if (field1.visibleValue == value) {
                field1.show();
            } else {
                field1.hide();
            }

            var field2 = uiRegistry.get('index = target');
            if (field2.visibleValue == value) {
                field2.show();
            } else {
                field2.hide();
            }

            /*var field3 = uiRegistry.get('index = bannerimage');
            if (field3.visibleValue == value) {
                field3.show();
            } else {
                field3.hide();
            }*/

            var field4 = uiRegistry.get('index = video_link');
            if (field4.visibleValue == value) {
                field4.show();
            } else {
                field4.hide();
            }



            var field5 = uiRegistry.get('index = description');
            if (field5.visibleValue == value) {
                field5.show();
            } else {
                field5.hide();
            }

            return this._super();
        },

        fieldDepend: function (value) {
            setTimeout(function () {
                var field1 = uiRegistry.get('index = link');
                if (field1.visibleValue == value) {
                    field1.show();
                } else {
                    field1.hide();
                }



                var field2 = uiRegistry.get('index = target');
                if (field2.visibleValue == value) {
                    field2.show();
                } else {
                    field2.hide();
                }

                /*var field3 = uiRegistry.get('index = bannerimage');
                if (field3.visibleValue == value) {
                    field3.show();
                } else {
                    field3.hide();
                }*/

                //console.log(field3.visibleValue);

                var field4 = uiRegistry.get('index = video_link');
                if (field4.visibleValue == value) {
                    field4.show();
                } else {
                    field4.hide();
                }

                var field5 = uiRegistry.get('index = description');
                if (field5.visibleValue == value) {
                    field5.show();
                } else {
                    field5.hide();
                }

            });

        }

    });

});