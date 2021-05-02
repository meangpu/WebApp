using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;
using TMPro;

public class freezePlayer : MonoBehaviour
{
    public GameObject player;
    public TextMeshProUGUI textButtonFreeze;
    private bool freeze = false;

    public void changePlayerState(){
        if (!freeze) {
            player.GetComponent<Rigidbody2D>().bodyType = RigidbodyType2D.Static;
            textButtonFreeze.text = "Unfreeze player";
            freeze = true;
        }
        else{
            player.GetComponent<Rigidbody2D>().bodyType = RigidbodyType2D.Dynamic;
            textButtonFreeze.text = "Freeze player";
            freeze = false;
        }
    }

}
