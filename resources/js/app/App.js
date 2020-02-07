import React, { Fragment } from 'react';
import ReactDOM from 'react-dom';
import Routes from './router'
import AppProvider from './provider'


const App = () => {
    return (
        <AppProvider>
            <Routes />
        </AppProvider>
    );
}

export default App;

