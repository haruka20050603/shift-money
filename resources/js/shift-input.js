
  // ==========================
// タブ取得
// ==========================

const shiftTab = document.getElementById("shift-tab");
const expenseTab = document.getElementById("expense-tab");
const bonusTab = document.getElementById("bonus-tab");

// ==========================
// 画面取得
// ==========================

const shiftForm = document.getElementById("shiftForm");
const expenseForm = document.getElementById("expenseForm");
const bonusForm = document.getElementById("bonusForm");

// ==========================
// シフトタブ
// ==========================

shiftTab.addEventListener("click", () => {

    shiftForm.style.display = "block";
    expenseForm.style.display = "none";
    bonusForm.style.display = "none";

    shiftTab.classList.add("active");
    expenseTab.classList.remove("active");
    bonusTab.classList.remove("active");

});

// ==========================
// 浪費タブ
// ==========================

expenseTab.addEventListener("click", () => {

    shiftForm.style.display = "none";
    expenseForm.style.display = "block";
    bonusForm.style.display = "none";

    shiftTab.classList.remove("active");
    expenseTab.classList.add("active");
    bonusTab.classList.remove("active");

});

// ==========================
// ボーナスタブ
// ==========================

bonusTab.addEventListener("click", () => {

    shiftForm.style.display = "none";
    expenseForm.style.display = "none";
    bonusForm.style.display = "block";

    shiftTab.classList.remove("active");
    expenseTab.classList.remove("active");
    bonusTab.classList.add("active");

});
