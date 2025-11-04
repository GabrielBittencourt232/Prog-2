body {
    font-family: "Segoe UI", Roboto, Arial, sans-serif;
    background: #f4f7fb;
    color: #113;
    margin: 0;
    padding: 36px;
}
.container {
    max-width: 980px;
    margin: 0 auto;
    background: #ffffff;
    padding: 20px 24px;
    border-radius: 10px;
    box-shadow: 0 8px 30px rgba(15, 23, 42, 0.06);
}
.header h1 {
    margin: 0 0 6px 0;
    font-size: 24px;
    color: #0b2545;
}
.subtitle {
    margin: 0 0 18px 0;
    color: #60728a;
    font-size: 14px;
}
.table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 8px;
    overflow: hidden;
    border-radius: 8px;
}
.table th, .table td {
    padding: 12px 14px;
    text-align: left;
    border-bottom: 1px solid #eef4fb;
    font-size: 14px;
}
.table thead th {
    background: linear-gradient(180deg,#fbfdff,#f3f8ff);
    color: #0b3a5a;
    font-weight: 600;
}
.table tbody tr:hover {
    background: #fbfdff;
}
.alert-error {
    background: #fff0f1;
    color: #b91c1c;
    padding: 10px;
    border-radius: 6px;
    margin-bottom: 12px;
}
.empty {
    color: #6b7280;
    padding: 14px 0;
}

/* Mobile: transform table to stacked cards */
@media (max-width: 700px) {
    .table thead { display: none; }
    .table, .table tbody, .table tr, .table td { display: block; width: 100%; }
    .table tr { margin-bottom: 12px; background: #fafcff; border-radius: 8px; padding: 10px; }
    .table td { 
        padding: 8px 10px; 
        border: none; 
        display: flex; 
        justify-content: space-between; 
        align-items: center;
        font-size: 14px;
    }
    .table td::before {
        content: attr(data-label);
        font-weight: 600;
        color: #334155;
        margin-right: 12px;
        flex: 1 1 auto;
    }
    .table td > * { flex: 0 1 auto; }