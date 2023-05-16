jQuery(document).ready(function () {
  jQuery(".toggleMenu").click(function (e) {
    jQuery("#menu ul").slideToggle(500);
    e.preventDefault();
  });
});
