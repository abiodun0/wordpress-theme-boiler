require.config({
  baseUrl:'.',
  paths:{
    // Core libs
    backbone:'libs/backbone/backbone',    
    // loaded from CDN
    handlebars: "//cdnjs.cloudflare.com/ajax/libs/handlebars.js/2.0.0-alpha.4/handlebars.min",
    jquery: "//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min",
    underscore:"//cdnjs.cloudflare.com/ajax/libs/underscore.js/1.6.0/underscore-min",
    moment:'//cdnjs.cloudflare.com/ajax/libs/moment.js/2.7.0/moment.min',
    GMaps:"//cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.12/gmaps.min",
    // require-js plugins
    cs: 'libs/require-cs/cs',
    'coffee-script': 'libs/coffee-script/index',    
    text:'libs/text/text',
    // path to templates
    tmpl:'templates'    
  },
  shim:{
    backbone:{
      deps:['underscore','jquery'],
      exports:'Backbone'
    }
  }
})