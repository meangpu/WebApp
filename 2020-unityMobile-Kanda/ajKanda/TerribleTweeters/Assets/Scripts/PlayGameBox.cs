using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.SceneManagement;

public class PlayGameBox : MonoBehaviour
{
    public string sceneStart;

    void OnCollisionEnter2D(Collision2D collision)
    {
        if (collision.gameObject.tag == "Player")
        {
            Invoke("startPlayGame", 2.0f);
        }
    }

    void startPlayGame()
    {
        SceneManager.LoadScene(sceneStart);
    }
}
