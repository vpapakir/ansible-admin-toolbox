import { Icon } from "..";

function Card({ cardList, cardPlace, cardCol }) {

    const cardListing = (card) => {
        return card.map((carditem, index) => {
            return (
                <div className="cw-cardbody" key={index}>
                    {
                        carditem.iconSvg || carditem.imageurl &&
                        <div className="cw-icon">
                            {carditem.iconSvg && <span className="cw-icon-svg">{carditem.iconSvg}</span>}

                            {
                                carditem.imageurl &&
                                (carditem.headingUrl ?
                                    <a target="_blank" href={carditem.headingUrl} >
                                        <img src={carditem.imageurl} className="cw-img" />
                                    </a> :
                                    <img src={carditem.imageurl} className="cw-img" />
                                )
                            }
                        </div>
                    }
                    <div className="cw-text-wrap">
                        {
                            carditem.heading &&
                            (carditem.headingUrl ?
                                <a target="_blank" href={carditem.headingUrl} className="heading-link">
                                    <h3 className="cw-heading">{carditem.heading}</h3>
                                </a> :
                                <h3 className="cw-heading">{carditem.heading}</h3>
                            )
                        }
                        {carditem.para && <p className="cw-text">{carditem.para}</p>}
                        <div className="cw-button">
                            {carditem.buttonUrl && carditem.buttonText &&
                                <a href={carditem.buttonUrl} className="cw-btn" target="_blank">{carditem.buttonText}<Icon icon="arrow" /></a>
                            }
                        </div>
                    </div>
                    {
                        cardPlace === 'cw-pro' &&
                        <div className="cw-icon-two">
                            <div className="icon"><Icon icon="lock" /></div>
                        </div>
                    }
                </div>
            )
        })
    }
    const classes = `cw-card ${cardPlace} ${cardCol}`;
    return (
        <>
            <div className={classes}>
                {
                    cardListing(cardList)
                }
            </div>
        </>
    )
}

export default Card;