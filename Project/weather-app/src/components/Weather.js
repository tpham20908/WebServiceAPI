import React, { Component } from 'react'

const Weather = (props) => (
  <div className="weather__info">
    {props.city && 
      <p className="weather__key">Location: &nbsp;
        <span className="weather__value">{props.city}, {props.country}</span>
      </p>}
    {props.temperature && 
      <p className="weather__key">Temperature: &nbsp;
        <span className="weather__value">{props.temperature}&#8451;</span>
      </p>}
    {props.humidity && 
      <p className="weather__key">Humidity: &nbsp;
        <span className="weather__value">{props.humidity}&#37;</span>
      </p>}
    {props.description && 
      <p className="weather__key">Condition: &nbsp;
        <span className="weather__value">{props.description}</span>
      </p>}
    {props.error && 
      <p className="weather__error">{props.error}</p>}
  </div>
);


export default Weather;