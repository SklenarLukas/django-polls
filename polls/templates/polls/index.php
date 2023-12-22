<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

{% load static %}

<link rel="stylesheet" href="{% static 'polls/main.css' %}">


{% comment %} {% load static %}

<link rel="stylesheet" href="{% static 'polls/main.css' %}">

{% if latest_question_list %}
<ul>
  {% for question in latest_question_list %}
  <li>
    <a href="{% url 'polls:detail' question.id %}">{{ question.question_text }}</a>
  </li>
  {% endfor %}
</ul>
{% else %}
<p>No polls are available.</p>
{% endif %}
 {% endcomment %}


<script src="https://kit.fontawesome.com/18e1dd3624.js" crossorigin="anonymous"></script>
<script src="../../static/polls/js/script.js"></script>
<link rel="stylesheet" href="../../static/polls/js/script.js">

<script>
  const cards = Array.from(document.querySelectorAll(".card"));
  const cardsContainer = document.querySelector("#cards");

  cardsContainer.addEventListener("mousemove", (e) => {
    for (const card of cards) {
      const rect = card.getBoundingClientRect();
      x = e.clientX - rect.left;
      y = e.clientY - rect.top;

      card.style.setProperty("--mouse-x", `${x}px`);
      card.style.setProperty("--mouse-y", `${y}px`);
    }
  });
</script>

<h1 class="main_title">Polls App</h1>


{% if latest_question_list %}
<div id="cards">
  {% for question in latest_question_list %}
  <div class="card">
    <div class="card-content">
      <i class="fa-solid fa-square-poll-vertical"></i>
      <h4 class="text-center">{{ question.question_text }}</h4>
      <a href="{% url 'polls:detail' question.id %}" class="card_link"><b>Vote</b><i class="fa-solid fa-link"></i></a>
    </div>
  </div>
  {% endfor %}
  {% else %}
  <p>No polls are available.</p>
  {% endif %}


</div>