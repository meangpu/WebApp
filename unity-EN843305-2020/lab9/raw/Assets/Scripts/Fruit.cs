using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;

public class Fruit : MonoBehaviour
{

    GameManager gameManager;

    private void Start() 
    {
        gameManager = GameObject.Find("GameManager").GetComponent<GameManager>();
    }

    private void OnCollisionEnter2D(Collision2D other) {
        
        if (other.gameObject.name == "player")
        {
            GameObject.Find("GameManager").GetComponent<GameManager>().score += 1;
            Destroy(gameObject);
            GameObject.Find("GameManager").GetComponent<GameManager>().updateScore();
        }
        else if (other.gameObject.tag == "Ground")
        {
            Destroy(gameObject);
            gameManager.life -= 1;

            // GameOver
            if (gameManager.life <= 0)
            {
                gameManager.GameOver();
            }
        }
        
    }
}
