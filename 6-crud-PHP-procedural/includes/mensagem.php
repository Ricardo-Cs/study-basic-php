<!-- Mensagem de sucesso ou erro ao cadastrar -->
<?php
//Iniciando sessão
session_start();
if (isset($_SESSION['mensagem'])) { ?>
  <script>
    window.onload = function() {
      M.toast({
        html: '<?php echo $_SESSION['mensagem']; ?>'
      })
    }
  </script>

<?php
}
session_unset();
?>