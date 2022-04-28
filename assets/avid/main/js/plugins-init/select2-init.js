/**
 * **************************************************
 * ******* Name: arvid
 * ******* Description: Bootstrap 4 Admin Dashboard
 * ******* Version: 1.0.0
 * ******* Released on 2019-02-13 00:31:50
 * ******* Support Email : quixlab.com@gmail.com
 * ******* Support Skype : sporsho9
 * ******* Author: Quixlab
 * ******* URL: https://quixlab.com
 * ******* Themeforest Profile : https://themeforest.net/user/quixlab
 * ******* License: ISC
 * ***************************************************
 */

// !function(e){"use strict";e(document).ready(function(){function t(t){return t.id?e('<span><img src="../assets/images/flags/'+t.element.value.toLowerCase()+'.png" class="img-flag" /> '+t.text+"</span>"):t.text}e(".js-example-basic-select2").select2({placeholder:"Select a state"}),e(".js-example-templating").select2({placeholder:"Select a state",templateResult:t,templateSelection:t,allowClear:!0});e(".js-example-data-array").select2({data:[{id:0,text:"Enhancement"},{id:1,text:"Bug"},{id:2,text:"Duplicate"},{id:3,text:"Invalid"},{id:4,text:"Wontfix"}]}),e(".js-data-example-ajax").select2({placeholder:"Choose your github repo",ajax:{url:"https://api.github.com/search/repositories",dataType:"json",delay:250,data:function(e){return{q:e.term,page:e.page}},processResults:function(e){return{results:e.items}},processResults:function(e,t){return t.page=t.page||1,{results:e.items,pagination:{more:30*t.page<e.total_count}}},cache:!0},escapeMarkup:function(e){return e},minimumInputLength:1,templateResult:function(e){if(e.loading)return e.text;var t="<div class='select2-result-repository clearfix'><div class='select2-result-repository__avatar'><img src='"+e.owner.avatar_url+"' /></div><div class='select2-result-repository__meta'><div class='select2-result-repository__title'>"+e.full_name+"</div>";return e.description&&(t+="<div class='select2-result-repository__description'>"+e.description+"</div>"),t+="<div class='select2-result-repository__statistics'><div class='select2-result-repository__forks'><i class='fa fa-flash'></i> "+e.forks_count+" Forks</div><div class='select2-result-repository__stargazers'><i class='fa fa-star'></i> "+e.stargazers_count+" Stars</div><div class='select2-result-repository__watchers'><i class='fa fa-eye'></i> "+e.watchers_count+" Watchers</div></div></div></div>"},templateSelection:function(e){return e.full_name||e.text}})})}(window.jQuery);


(function($) {
    "use strict"
    
    // single select box
    $("#single-select").select2();

    // multi select box
    $('.multi-select').select2();

    // dropdown option groups
    $('.dropdown-groups').select2();

    //disabling options
    $('.disabling-options').select2();

    //ajax remote data
    $(".js-data-example-ajax").select2({
        width: "100%",
        ajax: {
          url: "https://api.github.com/search/repositories",
          dataType: 'json',
          delay: 250,
          data: function (params) {
            return {
              q: params.term, // search term
              page: params.page
            };
          },
          processResults: function (data, params) {
            // parse the results into the format expected by Select2
            // since we are using custom formatting functions we do not need to
            // alter the remote JSON data, except to indicate that infinite
            // scrolling can be used
            params.page = params.page || 1;
      
            return {
              results: data.items,
              pagination: {
                more: (params.page * 30) < data.total_count
              }
            };
          },
          cache: true
        },
        placeholder: 'Search for a repository',
        escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
        minimumInputLength: 1,
        templateResult: formatRepo,
        templateSelection: formatRepoSelection
      });

      function formatRepo (repo) {
        if (repo.loading) {
          return repo.text;
        }
      
        var markup = "<div class='select2-result-repository clearfix'>" +
          "<div class='select2-result-repository__avatar'><img src='" + repo.owner.avatar_url + "' /></div>" +
          "<div class='select2-result-repository__meta'>" +
            "<div class='select2-result-repository__title'>" + repo.full_name + "</div>";
      
        if (repo.description) {
          markup += "<div class='select2-result-repository__description'>" + repo.description + "</div>";
        }
      
        markup += "<div class='select2-result-repository__statistics'>" +
          "<div class='select2-result-repository__forks'><i class='fa fa-flash'></i> " + repo.forks_count + " Forks</div>" +
          "<div class='select2-result-repository__stargazers'><i class='fa fa-star'></i> " + repo.stargazers_count + " Stars</div>" +
          "<div class='select2-result-repository__watchers'><i class='fa fa-eye'></i> " + repo.watchers_count + " Watchers</div>" +
        "</div>" +
        "</div></div>";
      
        return markup;
      }
      
    function formatRepoSelection (repo) {
        return repo.full_name || repo.text;
    }




    // loading array data
    var data = [
        {
            id: 0,
            text: 'enhancement'
        },
        {
            id: 1,
            text: 'bug'
        },
        {
            id: 2,
            text: 'duplicate'
        },
        {
            id: 3,
            text: 'invalid'
        },
        {
            id: 4,
            text: 'wontfix'
        }
    ];
    $(".js-example-data-array").select2({
      data: data
    })


})(jQuery);