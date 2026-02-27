<script>
$(document).ready(function(){
  //alert("hi");
var msc = $('#mscategory').magicSuggest({
  dataType : "json",
  data: '<?php echo base_url(); ?>employer/JobManagement/job_locations',
  minChars: 1,
  maxSelection:1,
  required: true,
  useCommaKey: false,
  allowFreeEntries: true
});

msc.setDataUrlParams({biz:2});
$(msc).on('load', function(e,data){
  //console.log('Loaded data:', data);
  //finished loading 
});
});
</script>