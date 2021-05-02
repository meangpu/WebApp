using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class floorDeath : MonoBehaviour
{
    public GameManager gameManager;

    void start(){
        gameManager = GameObject.Find("GameManager").GetComponent<GameManager>();
    }

    private void OnCollisionEnter(Collision collision){
        if(collision.gameObject.tag == "Player"){
            gameManager.gameover("you fall!!");
        }

    }
}
