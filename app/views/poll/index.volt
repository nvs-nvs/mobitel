<h1>Опрос</h1>
<ul>
{% for poll in polls %}
    <li>{{ link_to('poll/show/' ~ poll.id, poll.text) }}</li>
{% endfor %}
</ul>