import "./App.css"
import Card from "./components/card/Card";
import Navbar from "./components/navbar/Navbar";


function App() {
  return (
    <div className="main">

      <Navbar />

      <div className="card-container">
        <Card />
        <Card />
        <Card />
        <Card />
        <Card />
        <Card />

      </div>
    </div>
  )
}

export default App;





