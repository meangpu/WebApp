using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;

public class Fruit : MonoBehaviour
{

    private void OnCollisionEnter2D(Collision2D other) {
        
        if(other.gameObject.name == "player"){
            GameObject.Find("EventSystem").GetComponent<GameManager>().score += 1;
            Destroy(gameObject);
            GameObject.Find("EventSystem").GetComponent<GameManager>().updateScore();
        }
        
    }
}
