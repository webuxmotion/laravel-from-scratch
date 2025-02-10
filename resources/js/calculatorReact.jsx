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
            <div>
                <label htmlFor="dollar_currency">Курс доллара</label>
                <div>
                    <input
                        id="dollar_currency"
                        type="text"
                        onChange={(e) => setDollarCurrency(e.target.value)}
                    />
                </div>
            </div>

            <div>
                <label>Кількість місяців</label>
                <div>
                    <input
                        type="number"
                        onChange={(e) => setMonths(e.target.value)}
                    />
                </div>
            </div>

            <div>
                <label>Витрати на місяць</label>
                <div>
                    <input
                        type="text"
                        onChange={(e) => setExpenses(e.target.value)}
                    />
                </div>
            </div>

            <div>
                Budget per day in period {months} months: {budgetPerDayInPeriod}
            </div>
        </div>
    );
}

const domNode = document.getElementById("calculator");

if (domNode) {
    const root = createRoot(domNode);
    root.render(<Calculator />);
}

