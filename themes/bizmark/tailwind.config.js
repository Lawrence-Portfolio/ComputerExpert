const colors = require('tailwindcss/colors')

module.exports = {
    purge: [
        '*/*/*.js',
        '*/*.htm',
        '*/*/*.htm',
        '*/*/*/*.htm',
        '*/*/*/*/*.htm',
        '*/*/*/*/*/*.htm',
        '*/*/*/*/*/*/*.htm',
    ],
    darkMode: 'media',
    theme: {
        screens: {
            sm: "576px",
            md: "768px",
            lg: "992px",
            xl: "1320px"
        },
        container: {
            screens: {
                sm: "576px",
                md: "768px",
                lg: "992px",
                xl: "1320px"
            },
        },
        colors: {
            transparent: 'transparent',
            white: '#FFFFFF',
            black: '#000000',
            link: '#133FE3',
            discount: '#FF2323',
            lightBlack: '#484848',
            primary: '#133FE3',
            primaryHover: '#3C65FF',
            secondary: '#ACD57A',
            disabled: '#8A8A8A',
            gray: '#5B5B5B',
            green: '#5EA80D',
            lightGray: '#F5F5F5',
            darkGray: '#7B7B7B',
            topStrip: '#96CD59',
            bottomStrip: '#373737',
            border: '#DADADA'
        },
        spacing: {
            '2': '2px',
            '3': '3px',
            '0': '0',
            '5': '5px',
            '10': '10px',
            '15': '15px',
            '20': '20px',
            '25': '25px',
            '30': '30px',
            '35': '35px',
            '40': '40px',
            '45': '45px',
            '50': '50px',
            '55': '55px',
            '60': '60px',
            '65': '65px',
            '70': '70px',
            '75': '75px',
            '80': '80px',
            '85': '85px',
            '90': '90px',
            '95': '95px',
            '100': '100px',
            '105': '105px',
            '110': '110px',
            '115': '115px',
            '120': '120px',
            '125': '125px',
            '130': '130px',
            '135': '135px',
            '140': '140px',
            '145': '145px',
            '150': '155px',
            '160': '160px',
            '165': '165px',
            '170': '170px',
            '175': '175px',
            '180': '180px',
            '185': '185px',
            '190': '190px'
        },
        borderRadius: {
            'none': '0',
            '2': '2px',
            '5': '5px',
            '10': '10px',
            'circle': '50%'
        },
        borderWidth: {
            DEFAULT: '1px',
            '0': '0',
            '1': '1px'
        },
        lineHeight: {
            '0': '1',
            '1': '1.1',
            '2': '1.2',
            '3': '1.3',
            '4': '1.4',
            '5': '1.5'
        }
    },
    variants: {

    }
}
