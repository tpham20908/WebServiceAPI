import React, { Component } from 'react'

class Form extends Component {
    state = {
        cities: []
    }

    componentWillMount() {
        fetch("https://restcountries.eu/rest/v2/all?fields=capital")
        .then(res => res.json())
        .then(data => this.setState({cities: data}));
    }

    render() {
        const citiesArr = [];
        this.state.cities.map(city => {
            if (city.capital !== "")
                citiesArr.push(city.capital)
        });
        const cities = citiesArr.sort().map(function (city, id) {
            return (
                <option key={id}>{city}</option>
            )
        });
        return (
            <div>
                <form onSubmit={this.props.getWeather}>
                    <select name="city">
                        <option>Select city</option>
                        {cities}
                    </select>
                    <button>Get Weather</button>
                </form>
            </div>
        )
    }
}

export default Form;