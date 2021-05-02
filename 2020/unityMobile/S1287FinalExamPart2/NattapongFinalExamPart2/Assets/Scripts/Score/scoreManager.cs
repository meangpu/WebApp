using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using TMPro;

public class scoreManager : MonoBehaviour
{
    GameManager gameManager;
    public TMP_Text selfPoint;
    public int scorePoint;
    
    private void Start() 
    {
        gameManager = GameObject.Find("GameManager").GetComponent<GameManager>();
        selfPoint.text = scorePoint.ToString();
        gameObject.transform.localScale += new Vector3(scorePoint, scorePoint, scorePoint);
    }


    private void OnTriggerEnter2D(Collider2D other) 
    {
        if (other.gameObject.tag == "Player")
        {
            FindObjectOfType<AudioManager>().Play("ps");
            gameManager.PlayerScore += scorePoint;
            gameManager.checkHighScore();
            gameManager.updateScoretext();
            gameManager.updateAllScore();
            Destroy(gameObject);

        }
    }
}
