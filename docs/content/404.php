<?
ob_start();
?>
<div class="base-block">
  <ul class="errors">
    <li>Ошибка 404: страница не найдена</li>
  </ul>
  <a href="/">Вернуться на главную страницу</a>
</div>

<?
$content = ob_get_clean();
?>