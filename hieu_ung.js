var search = document.querySelector('.search')
var city = document.querySelector('.city')
var country = document.querySelector('.country')
var value = document.querySelector('.value')
var shortDec = document.querySelector('.short-dec')
var visibility = document.querySelector('.visibility span')
var wind = document.querySelector('.wind span')
var sun = document.querySelector('.sun span')
var content = document.querySelector('.content')
const searchBox = document.querySelector('.card input') 
async function checkWeather(cityy){
    let apiURL = 'https://api.openweathermap.org/data/2.5/weather?q=' + cityy + '&appid=a646587a811276b946fb8971eb5bfa61'
    let data = await fetch(apiURL).then(res => res.json())
    console.log(data)
    if(data.cod == 200){
        content.classList.remove('hide')
        city.innerText = data.name + ','
        country.innerText = data.sys.country
        visibility.innerText = data.visibility + 'm'
        wind.innerText = data.wind.speed + 'm/s'
        sun.innerText = data.main.humidity + '%'
        value.innerText = Math.round((data.main.temp - 273.15)) + '°C'

        if(data.weather[0].main == "Clouds"){
            shortDec.src = "img/clouds.png";
        }
        else if(data.weather[0].main == "Clear"){
            shortDec.src = "img/clear.png";
        }
        else if(data.weather[0].main == "Rain"){
            shortDec.src ="img/rain.png";
        }
        else if(data.weather[0].main == "Drizzle"){
            shortDec.src = "img/drizzle.png";
        }
        else if(data.weather[0].main == "Mist"){
            shortDec.src = "img/mist.png";
        }
    }
    else{
        content.classList.add('hide')
    }
}

    search.addEventListener('keypress', function(e){
        if(e.code === 'Enter'){
            checkWeather(searchBox.value)
        }
    })