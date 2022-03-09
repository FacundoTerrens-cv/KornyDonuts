<table>
  
  <thead>
    <th>name</th>
    <th>war</th>
    <th>ba</th>
    <th>obp</th>
    <th>slg</th>
    <th>ops</th>
    <th>rbi</th>
    <th>hr</th>
  </thead>
  
  <tbody>
    <tr>
      <td data-label="name">Ken Griffey Jr.</td>
      <td data-label="war">83.8</td>
      <td data-label="ba">.284</td>
      <td data-label="obp">.370</td>
      <td data-label="slg">.583</td>
      <td data-label="ops">.907</td>
      <td data-label="rbi">1836</td>
      <td data-label="hr">630</td>
    </tr>
      
      <tr>
      <td data-label="name">Derek Jeter</td>
      <td data-label="war">71.3</td>
      <td data-label="ba">.310</td>
      <td data-label="obp">.377</td>
      <td data-label="slg">.440</td>
      <td data-label="ops">.817</td>
      <td data-label="rbi">1311</td>
      <td data-label="hr">260</td>
    </tr>
      
      <tr>
      <td data-label="name">Cal Ripken Jr.</td>
      <td data-label="war">95.9</td>
      <td data-label="ba">.276</td>
      <td data-label="obp">.340</td>
      <td data-label="slg">.447</td>
      <td data-label="ops">.788</td>
      <td data-label="rbi">1695</td>
      <td data-label="hr">431</td>
    </tr>
      
      <tr>
      <td data-label="name">Darryl Strawberry</td>
      <td data-label="war">42.2</td>
      <td data-label="ba">.259</td>
      <td data-label="obp">.357</td>
      <td data-label="slg">.505</td>
      <td data-label="ops">.862</td>
      <td data-label="rbi">1000</td>
      <td data-label="hr">335</td>
    </tr>
  </tbody>
  
</table>
<style>

@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;600&display=swap');

* {
  box-sizing: border-box;
}

body {
  font-family: 'Poppins', 'Verdana', sans-serif;
  display: flex;
  align-items: center;
  padding: 1.25em;
  min-height: 100vh;
  color: #444;
}

table {
  width: 100%;
  border-spacing: 0;
  border-radius: 1em;
  overflow: hidden;
}

thead {
 visibility: hidden;
 position: absolute;
 width: 0;
 height: 0;
}

th {
  background: #215A8E;
  color: #fff;
}

td:nth-child(1) {
  background: #215A8E;
  color: #fff;
  border-radius: 1em 1em 0 0;
}

th, td {
  padding: 1em;
}

tr, td {
  display: block;
}

td {
  position: relative;
}

td::before {
  content: attr(data-label);
  position: absolute;
  left: 0;
  padding-left: 1em;
  font-weight: 600;
  font-size: .9em;
  text-transform: uppercase;
}

tr {
  margin-bottom: 1.5em;
  border: 1px solid #ddd;
  border-radius: 1em;
  text-align: right;
}

tr:last-of-type {
  margin-bottom: 0;
}

td:nth-child(n+2):nth-child(odd) {
  background-color: #ddd;
}


@media only screen and (min-width: 768px) {
  
  table {
    max-width: 1200px;
    margin: 0 auto;
    border: 1px solid #ddd;
  }
  
  thead {
    visibility: visible;
    position: relative;
  }
  
  th {
    text-align: left;
    text-transform: uppercase;
    font-size: .9em;
  }
  
  tr {
    display: table-row;
    border: none;
    border-radius: 0;
    text-align: left;
  }
  
  tr:nth-child(even) {
  background-color: #ddd;
}
  
  td {
    display: table-cell;
  }
  
  td::before {
    content: none;
  }
  
  td:nth-child(1) {
    background: transparent;
    color: #444;
    border-radius: 0;
  }
  
  td:nth-child(n+2):nth-child(odd) {
    background-color: transparent;
  }
  
  
}   
</style>