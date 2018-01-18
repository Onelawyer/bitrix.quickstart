<?
$MESS ['FIELD_FOR_THEME_TIP'] = '<p>Выберите поле, значние которого будет заменять макрос #THEME# в теме письма (см. ниже)</p>';

$MESS ['EM_THEME_TIP'] = '<p>Можно использовать следующие макросы:</p>
<p>#THEME# - заменяется на значение поля формы указанного в настройке <b>Брать макрос #THEME# в теме письма из поля</b>;</p>
<p>#SITE# - заменяется на название сайта с которого отправляется письмо.</p>
<p>Например:</p>
<p>#SITE#: #THEME#<br>
или<br>
#SITE#: Сообщение из формы обратной связи</p>';

$MESS ['AFTER_TEXT_TIP'] = '<p>Можно использовать макрос: #SITE# - заменяется на название сайта с которого отправляется письмо.</p>
<p>Например:</p>
<p>Сообщение с сайта #SITE#</p>';

$MESS ['USE_EMAIL_USER_TIP'] = '<p>E-mail отправителя письма брать из поля формы указанного в настройке <b>Выберите поле для E-mail</b> (см. ниже).</p>
<p>Если checkbox не выбран, то используется E-mail администратора сайта (отправитель по умолчанию) из настроек главного модуля.</p>';

$MESS ['EMAIL_TO_TIP'] = '<p>Выберите и/или добавьте адреса электронной почты, на которые будет отправлено письмо.</p>';

$MESS ['EXT_FIELDS_TIP'] = '<p>Выберите и/или добавьте свои поля для заполнения.</p>
<p>Поле <b>Сообщение</b> которое уже есть в списке, будет размещенно в форме самым последним. И будет выводиться тегом <b>textarea</b>, как поле с типом "Текст".</p>
<p>После нажатия кнопки ОК, будут обновлены все списки, в которых нужно выбрать поле формы для определения каких-либо настроек компонента (см. ниже).</p>';

$MESS ['EVENT_TYPE_ID_TIP'] = '<p>После нажатия кнопки ОК, будут обновлены все списки, в которых нужно выбрать поле формы для определения каких-либо настроек компонента, а также список, в котором нужно выбрать почтовый шаблон для отправки письма (см. ниже).</p>';

$MESS ['REQUIRED_FIELDS_TIP'] = '<p>Выберите поля, которые обязательно должны быть заполнены пользователем. Письмо не будет отправлено, если хотя бы одно обязательное поле останется незаполненным.</p>
<p>Не рекомендуется оставлять все поля необязательными.</p>';

$MESS ['TEXTAREA_FIELDS_TIP'] = '<p>Выберите поля, которые следует выводить в форме заполнения полей как тег <b>textarea</b></p>
<p>Если в списке "Поля для заполнения" выбрано поле <b>Сообщение</b>, то оно всегда будет выводиться тегом <b>textarea</b>, как поле с типом "Текст".</p>';

$MESS ['FIELD_FOR_NAME_TIP'] = '<p>Значение этого поля сохраняется в сессии и, если пользователь авторизирован, то берется по умолчанию из данных пользователя, указанных при регистрации.</p>';

$MESS ['FIELD_FOR_EMAIL_TIP'] = '<p>Выберите поле, значение которого будет проверяться на синтаксическую корректность E-Mail адреса.</p>
<p>Если выбрано <b>Выводить checkbox "Отсылать себе копию письма"</b> (см. ниже), копия письма будет отправлятьсяна E-mail вводимый посетителем именно в это поле.</p>
<p>Значение этого поля сохраняется в сессии и, если пользователь авторизирован, то берется по умолчанию из данных пользователя, указанных при регистрации.</p>';

$MESS ['COPY_LETTER_TIP'] = '<p>Копия письма будет отправляться на почтовый адрес указанный посетителем в <b>поле для E-mail</b></p>';

$MESS ['IB_TYPE_TIP'] = '<p>После нажатия кнопки ОК, будет обновлен список, в котором нужно выбрать информационный блок (см. ниже).</p>';

$MESS ['IB_ACT_TIP'] = '<p>Активность создаваемого элемента информационного блока.</p>';

$MESS ['IBE_NAME_TIP'] = '<p>Выберите поле, которое будет записываться в название элемента информационного блока.</p>';

$MESS ['IB_DET_TIP'] = '<p>Выберите поле, которое будет записываться в детальное описание элемента информационного блока.</p>';

$MESS ['IB_ANONS_TIP'] = '<p>Выберите поле, которое будет записываться в краткое описание (анонс) элемента информационного блока.</p>';

$MESS ['IB_PARAM_TIP'] = '<p>Поля формы, которые не выбраны в предыдущих двух списках, будут записываться в свойства элемента информационного блока. Одно поле формы - одно свойство инфоблока.</p>';

$MESS ['WRIT_A_TIP'] = '<p>В конец письма будет добавлена ссылка на новый элемент информационного блока в административной части Битрикса.</p>';

$MESS ['FILE_FIELDS_TIP'] = '<p>Список формируется из поля <b>Поля для заполнения</b> (см. выше), но в него не попадают поля выбранные в:<br>
<b>Брать макрос #THEME# в теме письма из поля</b>;<br>
<b>Выберите поле для имени</b>;<br>
<b>Выберите поле для E-mail</b>.</p>';

$MESS ['FILE_DIR_TIP'] = '<p>Путь к папке обязательно должен начинаться с <b>/upload/</b>.</p>';

$MESS ['SAVE_FILE_TIP'] = '<p>Если не выбрано, то после отправки письма, загруженные на сайт файлы будут автоматически удалены.</p>';

$MESS ['MAX_SIZE_FILE_TIP'] = '<p>Целое число от 1 до 1024.</p>';
?>