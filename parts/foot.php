<?php
  $modalLoader = ModalLoader::get();

  while ($modal = $modalLoader->pop()) {
    include_once "components/modals/$modal.php";
  }
?>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
<script src="/hsef/js/vendors/jquery.serializejson.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

<!-- FontAwesome -->
<script src="https://kit.fontawesome.com/5ca0af638e.js" crossorigin="anonymous"></script>

<!-- Axios -->
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<!-- Custom Scripts -->
<?php
  $jsLoader = JS::get();
  $globalScripts = ['utils'];
  $globalScripts = ['rowSlider'];
  $globalScripts = ['axiosBase'];

  foreach ($globalScripts as $globalScript) {
    $jsLoader->addGlobal($globalScript);
  }
?>
<?php $jsLoader->loadScripts(); ?>
</body>
</html>