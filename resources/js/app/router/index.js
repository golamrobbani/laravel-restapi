import React, { Fragment } from 'react';
import { Router, Redirect } from '@reach/router'

import Layout from '../layout'

let Home = () => <Layout>Home</Layout>
let Dash = () => <Layout>Dash</Layout>

const Index = () => {
    return (
        <Fragment>
            <Router>
                <Home path="/" />
                <Dash path="dashboard" />
            </Router>
        </Fragment>
    );
}

export default Index;
