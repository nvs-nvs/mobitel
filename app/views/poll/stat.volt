<h1>Результаты опроса</h1>
    {% for option in options %}
        <ul>
            <li>{{ option.answer }} - {{ option.votes }}</li>
        </ul>
    {% endfor %}

<p>
    {{ link_to('poll/', 'Вернуться к списку опросов') }}
</p>