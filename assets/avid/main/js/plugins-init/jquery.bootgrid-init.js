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

$("#bootgrid-basic").bootgrid({
    selection: true,
    multiSelect: true,
    rowSelect: true,
    keepSelection: true
}).on("selected.rs.jquery.bootgrid", function(e, rows)
{
    var rowIds = [];
    for (var i = 0; i < rows.length; i++)
    {
        rowIds.push(rows[i].id);
    }
    alert("Select: " + rowIds.join(","));
}).on("deselected.rs.jquery.bootgrid", function(e, rows)
{
    var rowIds = [];
    for (var i = 0; i < rows.length; i++)
    {
        rowIds.push(rows[i].id);
    }
    alert("Deselect: " + rowIds.join(","));
});

// $("#bootgrid-data").bootgrid({
//     icon: "icon glyphicon",

//     iconColumns: "glyphicon-list",

//     iconDown: "glyphicon-triangle-bottom",

//     iconRefresh: "glyphicon-repeat",

//     iconSearch: "glyphicon-search"
// });