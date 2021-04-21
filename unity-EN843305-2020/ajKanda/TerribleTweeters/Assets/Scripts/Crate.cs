using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;
using TMPro;

public class Crate : MonoBehaviour
{
    public int score = 1;
    [SerializeField] int hp = 1;
    [SerializeField] TextMeshPro hpText;
    scoreManager scoreScript;

    void Start()
    {
        scoreScript = GameObject.Find("EventSystem").GetComponent<scoreManager>();
        hpText.text = hp.ToString();
    }

    void OnCollisionEnter2D(Collision2D collision)
    {
        if (collision.gameObject.tag == "Player")
        {
            hp--; 
            hpText.text = hp.ToString();

            if (hp <= 0)
            {
                Debug.Log("Get score");
                Destroy(gameObject);
                scoreScript.addScore(score);
            }
            
        }
    }
}
