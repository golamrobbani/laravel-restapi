import React from 'react';
import ReactDOM from 'react-dom';
//import './index.css';
import App from './app/App';


if (document.getElementById('rapp')) {
    ReactDOM.render(<App />, document.getElementById('rapp'));
}
