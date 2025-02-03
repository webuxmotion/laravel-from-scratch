import React, { useEffect, useState } from "react";
import { createRoot } from "react-dom/client";

function Calculator() {
    const [items, setItems] = useState([]);
    const [dollarCurrency, setDollarCurrency] = useState(0);
    const [months, setMonths] = useState(0);
    const [expenses, setExpenses] = useState(0);
    const [total, setTotal] = useState(0);
    const [budgetPerDayInPeriod, setBudgetPerDayInPeriod] = useState(0);

    useEffect(() => {
        const totalExpenses = +months * +expenses;
        const totalMinusExpenses = +total - totalExpenses;

        const budgetPerDayInPeriod = totalMinusExpenses / (31 * +months);

        setBudgetPerDayInPeriod(budgetPerDayInPeriod);

    }, [months, expenses, total]);

    useEffect(() => {
        if (items.length > 0) {
            let sum = 0;

            items.forEach((item) => {
                let sumToAdd = 0;

                if (item.currency === "USD") {
                    sumToAdd = +item.balance * +dollarCurrency;
                } else {
                    sumToAdd = +item.balance;
                }

                sum += sumToAdd;
            });

            setTotal(+sum.toFixed(2));
        }
    }, [items, dollarCurrency]);

    useEffect(() => {
        async function fetchData() {
            // You can await here
            // get data from server with axios
            const wallets = await axios.get("/api/wallets");

            setItems(wallets.data);
        }
        fetchData();
    }, []);

    return (
        <div>
            <div className="kanuarLogo">
                {/* <div className="kanuarLogo__topText">✙🇺🇦💙💛ꑭ</div> */}
                <div className="kanuarLogo__topText">69</div>
                {/* <div className="kanuarLogo__text">KANUAR</div> */}
                <div className="kanuarLogo__bottomText" contenteditable="true">KANUAR</div>
            </div>
        </div>
    );
}

const domNode = document.getElementById("kanuar_logo");
const root = createRoot(domNode);
root.render(<Calculator />);
