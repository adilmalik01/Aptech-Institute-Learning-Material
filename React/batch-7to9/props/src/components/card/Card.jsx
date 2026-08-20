import "./card.css"

const Card = (props) => {
    
    return (<>


        <div className="card">
            <img src={props.image} alt="" />
            <div className="date-tag">
                <p>{props.tag}</p>
                <p>{props.date}</p>
            </div>
            <h1>{props.title}</h1>
        </div>


    </>);
}

export default Card;

