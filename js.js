
const results = document.getElementById('results');
const randomMeal = document.getElementById('randomMeal');

let urlSearch = '';

const fetchSearch = async(url) => {
	meals = await fetch(
    `https://www.themealdb.com/api/json/v1/1/${url}`)
    .then(res => res.json())
    .then(res => res.meals) 
};



// GET RANDOM MEAL
const randomMealDisplay = async() => {
  await fetchSearch('random.php');

  results.innerHTML = (
    
    meals.map(meal => (
            
      `
        <div class="randomContainer">
          <h2>${meal.strMeal}</h2>
          <div class="infos">
            <div>origin : ${meal.strArea}</div>
            <div>catégory : ${meal.strCategory}</div>
          </div>
          <img src='${meal.strMealThumb}'height="50%" width="50% />
          <p>${meal.strInstructions}</p>
          button<a href="${meal.strYoutube}" target="_blank"><i class="fab fa-youtube"></i></a>
        </div>
      `
    ))
  );
};

randomMeal.addEventListener('click', randomMealDisplay)
randomMealDisplay();