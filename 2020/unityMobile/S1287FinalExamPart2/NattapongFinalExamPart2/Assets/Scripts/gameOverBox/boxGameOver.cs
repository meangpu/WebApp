using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class boxGameOver : MonoBehaviour
{
    GameManager gameManager;

    private void Start() 
    {
        gameManager = GameObject.Find("GameManager").GetComponent<GameManager>();
    }

    private void OnCollisionEnter2D(Collision2D other) 
    {
        if (other.gameObject.tag == "Player")
        {
            FindObjectOfType<AudioManager>().Play("ps");
            gameManager.gameover();
            

        }
    }
}
