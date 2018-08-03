import React, { Component } from 'react'

class Title extends Component {
  render() {
    return (
      <div>
        <h1 className="title-container__title">Weather Finder</h1>
        <h3 className="title-container__subtitle">Find out temperatur, conditions and more...</h3>
      </div>
    )
  }
}

export default Title;