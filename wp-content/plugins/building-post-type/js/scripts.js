
var regionSelect = jQuery("select[name=region]");
var NumberOfFloorsInput = jQuery("input[name=number_of_floors]");
var EcoInput = jQuery("input[name=eco-friendliness]");
var TypeSelect = jQuery("select[name=type]");

var postContainer = jQuery(".site-main .row");
console.log(regionSelect);
jQuery('.post-filter button').click(function () {
	var data = {
		"region": regionSelect.val(),
		"number_of_floors" : NumberOfFloorsInput.val(),
		"eco-friendliness" : EcoInput.val(),
		"type" : TypeSelect.val()
	};
	jQuery.ajax({
    type: 'POST',
    url: '/wp-admin/admin-ajax.php',
    dataType: 'html',
    data: {
      action: 'filter_buildings',
      filter: data,
    },
    success: function(res) {
      postContainer.html(res);

    }
  });
});
