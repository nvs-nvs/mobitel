<h1>{{ poll.text }}</h1>

<form method="post" action="/poll/vote">
    {% for option in options %}
    <label><input type="radio" name="vote" value={{ option.id }}>{{ option.answer }}</label><br/>
    {% endfor %}
    <p>
        <label for="name">Логин:</label>
        <?php echo $this->tag->textField("name") ?>
    </p>
    {{ submit_button('Проголосовать') }}
</form>
<p>
    {{ link_to('poll/', 'Вернуться к списку опросов') }}
</p>

