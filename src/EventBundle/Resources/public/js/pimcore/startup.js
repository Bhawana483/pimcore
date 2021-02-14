pimcore.registerNS("pimcore.plugin.EventBundle");

pimcore.plugin.EventBundle = Class.create(pimcore.plugin.admin, {
    getClassName: function () {
        return "pimcore.plugin.EventBundle";
    },

    initialize: function () {
        pimcore.plugin.broker.registerPlugin(this);
    },

    pimcoreReady: function (params, broker) {
        // alert("EventBundle ready!");
    }
});

var EventBundlePlugin = new pimcore.plugin.EventBundle();
