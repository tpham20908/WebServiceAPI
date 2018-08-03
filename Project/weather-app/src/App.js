import React, { Component } from 'react';
import Title from "./components/Title";
import Form from "./components/Form";
import Weather from "./components/Weather";

const API_KEY = "a2cc469ef8f6b9c326aeb4f98c875cdd";

class App extends Component {
  state = {
    temperature: "",
    city: "",
    country: "",
    humidity: "",
    description: "",
    error: ""
  };

  getWeather = (e) => {
    e.preventDefault();
    const city = e.target.elements.city.value;
    if (city !== "Select city") {
      fetch("https://api.openweathermap.org/data/2.5/weather?q=" + city 
      + "&appid=" + API_KEY + "&units=metric")
      .then(res => res.json())
      .then(data => this.setState({
        temperature: data.main.temp,
        city: data.name,
        country: data.sys.country,
        humidity: data.main.humidity,
        description: data.weather[0].description,
        error: ""
      }));
    } else {
      this.setState({
        temperature: "",
        city: "",
        country: "",
        humidity: "",
        description: "",
        error: "Please select a city"
      })
    }
  }

  render() {
    return (
      <div className="wrapper"> 
        <div className="main">
          <div className="container">
            <div className="row">
              <div className="col-xs-5 title-container">
                <Title />
              </div>
              <div className="col-xs-7 form-container">
                <Form getWeather={this.getWeather} />
                <Weather 
                  temperature={this.state.temperature}
                  city={this.state.city}
                  country={this.state.country}
                  humidity={this.state.humidity}
                  description={this.state.description}
                  error={this.state.error}/>
              </div>
            </div>
          </div>
        </div>
      </div>
    )
  }
}

export default App;