import React from 'react';

const Footer = () => {
    return (
        <footer>
            <hr className="hr" />
            <div className="container">
                <div className="row justify-content-md-center">
                    <a className="col-md-auto me-3 text-dark" href="#">Home</a>
                    <a className="col-md-auto me-3 text-dark" href="#">Privacy Policy</a>
                    <a className="col-md-auto me-3 text-dark" href="#">Contact us</a>
                </div>
                <div className="row justify-content-md-center mb-3">
                    <span className="col-md-auto me-3 text-dark">All rights reserved 2024</span>
                </div>
            </div>
        </footer>
    );
};

export default Footer;
