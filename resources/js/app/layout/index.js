import React from 'react';

const Index = (props) => {
    return (
        <div className="container">
            <div className="row justify-content-center">
                <div className="col-md-8">
                    <div className="card">
                        <div className="card-header">Example Component</div>
                        <div className="card-body">
                        
                        {props.children}
                      
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
}

export default Index;
